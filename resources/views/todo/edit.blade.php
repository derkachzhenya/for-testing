@extends('layouts.base')
@section('title', 'Todo')
@section('content')
    <h1>Edit task</h1>
    <form action="{{ route('todo.update', $todo) }}" method="POST">
        @csrf
        @method("PUT")
        <input type="text" name="title" value="{{ $todo->title }}"><br>
        <textarea name="description">{{ $todo->description }}</textarea><br>
        <label>
            <input type="checkbox" name="is_completed" value="1" {{  $todo->is_completed ? 'checked' : ''}}>
            Ok
        </label><br>
        <button type="submit">Save</button>
    </form>
@endsection