@extends('layouts.base')
@section('title', $post['title'])
@section('content')
    <a href="{{ route('blog.index') }}">Back</a>
    <h1>{{ $post['title'] }}</h1>
@endsection