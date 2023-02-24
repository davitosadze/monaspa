<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Post::with('media')->get();
        return BlogResource::collection($blog);
    }

    public function details($post_id)
    {
        $blog = Post::where('id', $post_id)
            ->with('media')
            ->first();
        return new BlogResource($blog);
    }
}
