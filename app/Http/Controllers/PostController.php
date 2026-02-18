<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('title', 0)->first();
        return view('post.index', compact('posts'));
    }


    public function create()
    {
        $postsArr = [
            'title' => 'Hello',
            'content' => 'world',
            'image' => 'img.jpg',
            'likes' => 1,
            'is_published' => 1,
            'car'=>["bmw", 'audi'],
        ];

        Post::create([
            'title' => 'Hello',
            'content' => 'world',
            'image' => 'img.jpg',
            'likes' => 1,
            'is_published' => 1,
            'car'=>["bmw", 'audi'],
        ]);

        dd('created');
    }


    public function store(StorePostRequest $request)
    {
        //
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        
    }


    public function destroy(Post $post)
    {
        //
    }
}
