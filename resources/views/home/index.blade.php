@extends('layouts.base')
@section('title', 'Main')
@section('content')
    <h1 class="text-center">Main</h1>
    <a href="{{ route('blog.index') }}">Blog</a>
@endsection