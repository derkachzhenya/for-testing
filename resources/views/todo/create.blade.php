@extends('layouts.base')
@section('title', 'Todo')
@section('content')
    <h1>Create new todo</h1>
    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Name"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('todo.index') }}">Back</a>
@endsection