@extends('layouts.base')
@section('title', 'Blog')
@section('content')
    @foreach ($blogs as $blog)
        <div></div>
        <a href="{{ route('blog.show', $blog['id']) }}">{{ $blog['title'] }}</a>
    @endforeach
@endsection