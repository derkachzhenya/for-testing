<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = $this->generateSlug($request->title);

        $post->save();
    }

    private function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        $base = $slug;
        $i = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
