<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;


class LikeController extends Controller
{
    public function store(Request $request, Post $post): JsonResponse
    {
        $like = $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Post liked successfully.',
            'like' => $like,
        ], 201);
    }



    public function destroy(Request $request, Post $post): JsonResponse {}
    //
}
