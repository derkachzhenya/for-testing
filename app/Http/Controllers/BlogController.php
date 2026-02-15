<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = $this->posts();

        return view('blog.index', compact('posts'));
    }

    public function show(int $id): View
    {
        $post = collect($this->posts())->firstWhere('id', $id);

        if (! $post) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }

 
    private function posts(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Hello',
                'post' => 'How are you',
            ],
            [
                'id' => 2,
                'title' => 'Hellof',
                'post' => 'How are youe',
            ],
        ];
    }
}
