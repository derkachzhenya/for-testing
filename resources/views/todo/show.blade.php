@extends('layouts.base')
@section('title', 'Todo')
@section('content')
    <h1>{{ $todo->title }}</h1>
    <p>{{ $todo->description }}</p>
    <p>{{ $todo->is_completed ? 'This todo was made' : 'This todo was not made' }}</p>

    <a href="{{ route('todo.edit', $todo) }}">Edit</a>
    <a href="{{ route('todo.index') }}">Back</a>
@endsection

