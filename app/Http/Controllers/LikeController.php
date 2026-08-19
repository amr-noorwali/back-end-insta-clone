<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;


class LikeController extends Controller
{
    public function store(Request $request, Post $post): JsonResponse
    {
        $like = $post->likes()->firstOrCreate([
            'user_id' => $request->user()->id,
        ]);

        if (! $like->wasRecentlyCreated) {
            return response()->json([
                'message' => 'You already liked this post.',
            ], 409);
        }

        return response()->json([
            'message' => 'Post liked successfully.',
            'like' => $like,
        ], 201);
    }



    public function destroy(Request $request, Post $post): JsonResponse
    {
        $like = $post->likes()
            ->where('user_id', $request->user()->id)
            ->first();

        if (! $like) {
            return response()->json([
                'message' => 'You have not liked this post.',
            ], 404);
        }

        $like->delete();

        return response()->json([
            'message' => 'Like removed successfully.',
        ]);
    }
    //
}
