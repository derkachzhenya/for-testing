@extends('layouts.base')
@section('title', 'Task create')
@section('content')
    <h1>New task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placehorlder="Name"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('tasks.index') }}"><- Back</a>
@endsection