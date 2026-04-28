<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $topPost = Post::where('status', 'published')->whereHas('category',fn($q)=> $q->where('status','published'))->latest()->first();

        return view('welcome', [
            'posts' => Post::where('status', 'published')
                ->whereHas('category',fn($q)=> $q->where('status','published'))
                ->when(request('category'), fn ($q, $id) => $q->where('category_id', $id))
                ->latest()
                ->get(),
            'categories' => Category::where('status', 'published')->get(),
            'topPost' => $topPost,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts/details', [
            'post' => $post,
        ]);
    }

    public function search()
    {
        $query = request('q');
        $posts = Post::where('status', 'published')
            ->where('title', 'like', "%{$query}%")
            ->get();
        return view('search', ['posts' => $posts, 'query' => $query]);
    }

}
