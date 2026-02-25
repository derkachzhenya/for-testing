@extends('layouts.base')
@section('content')
    <h1>Update post</h1>
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>
        <div>
            <label>Body</label>
            <textarea name="body">{{ $post->body }}</textarea>
        </div>
        <div>
            <label>Published</label>
            <input type="checkbox" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }}>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection