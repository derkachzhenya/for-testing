<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = [
            ['id' => 1, 'title' => 'Hello'],
            ['id' => 2, 'title' => 'Hello2'],
        ];

        return view('blog.index', compact('posts'));
    }

    public function show(int $id): View
    {
        $posts = [
            ['id' => 1, 'title' => 'Hello'],
            ['id' => 2, 'title' => 'Hello2'],
        ];

        $post = collect($posts)->firstWhere('id', $id);

        return view('blog.show', compact('post'));
    }
}
