<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = [
            ['id'=>1, 'title'=>'Hello'],
            ['id'=>2, 'title'=>'Hello world']
        ];
        return view('blog.index', compact('blogs'));
    }

    public function show($id) {
        $blogs = [
            ['id'=>1, 'title'=>'Hello'],
            ['id'=>2, 'title'=>'Hello world']
        ]; 
        $blog=collect($blogs)->firstWhere('id', $id);
        return view('blog.show', compact('blog'));

    }
}
