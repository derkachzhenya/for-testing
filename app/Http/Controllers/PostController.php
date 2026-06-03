<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        /*
         Before

        $post->views++;

        $post->save();
        */

        //  After

        Post::where('id', $post->id)
            ->increment('views');

        return view('posts.show', compact('post'));
    }
}









