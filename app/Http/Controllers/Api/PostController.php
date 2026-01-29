<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return 'Hello world';
    }

    public function post()
    {
        return 'Post is working';
    }
}
