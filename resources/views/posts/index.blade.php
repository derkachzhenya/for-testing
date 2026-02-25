@extends('layouts.base')
@section('content')
    <h1>All posts</h1>
    <a href="{{ route('post.create') }}">Create post</a>
    @foreach ($posts as $post)
        <div>
            <h2><a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
            <a href="{{ route('post.edit', $post->id) }}">Update</a>
            <form action="{{ route('post.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection