<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories', [
            'categories' => Category::where('status', 'published')->latest()->get(),
        ]);
    }

    public function show(Category $category)
    {
        return view('category', [
            'category' => $category,
            'posts' => $category->posts()->where('status', 'published')->latest()->get(),
        ]);
    }
}
