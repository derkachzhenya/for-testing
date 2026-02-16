@extends('layouts.base')
@section('title', 'about')
@section('content')
    <a href="{{ route('base') }}">Back</a>
    @foreach ($posts as $post)
        <div><a href="{{ route('blog.show', $post['id']) }}">{{ $post['title'] }}</a></div>
    @endforeach
@endsection