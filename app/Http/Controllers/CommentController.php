<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){
        $validated=$request->validate([
            'body'=>'required|string'
        ]);

        $validated['user_id']=1;
        $post->comments()->create($validated);

        return redirect()->back();
    }
}
