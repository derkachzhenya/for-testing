@extends('layouts.base')
@section('title', 'about')
@section('content')
    @foreach ($posts as $post)
        <div><a href="{{ route('blog.show', $post['id']) }}">{{ $post['title'] }}</a></div>
        <div>{{ $post['post'] }}</div>

    @endforeach
@endsection
