<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'max:5120'],
            'caption' => ['nullable', 'string', 'max:2200'],
        ]);
        $imagePath = $request->file('image')->store('posts', 'public');

        $post = $request->user()->posts()->create([
            'image_path' => $imagePath,
            'caption' => $validated['caption'] ?? null,
        ]);

        return response()->json([
            'message' => 'Post created successfully.',
            'post' => $post,
        ], 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user:id,username');

        return response()->json($post);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): JsonResponse
    {

        Gate::authorize('update', $post);

        $validated = $request->validate([
            'caption' => ['nullable', 'string', 'max:2200'],
        ]);

        $post->update([
            'caption' => $validated['caption'] ?? null, 
            // here we wil update only the caption
        ]);

        return response()->json([
            'message' => 'Post updated successfully.',
            'post' => $post,
        ]);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
