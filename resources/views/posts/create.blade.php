@extends('layouts.base')
@section('content')
    <h1>Create post</h1>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Body</label>
            <textarea name="body"></textarea>
        </div>
        <div>
            <label>Published</label>
            <input type="checkbox" name="is_published" value="1">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection