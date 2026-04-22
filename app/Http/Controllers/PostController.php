<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'posts' => Post::where('status', 'published')
                ->when(request('category'), fn ($q, $id) => $q->where('category_id', $id))
                ->latest()
                ->get(),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts/details', [
            'post' => $post,
        ]);
    }
}
