<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Models\Post;

class CommentController extends Controller
{
    public function index(Post $post) {
        $comments = $post->comments()
        ->with('user')
        ->oldest()
        ->paginate(20);

        return CommentResource::collection($comments);
    }

    //
}
