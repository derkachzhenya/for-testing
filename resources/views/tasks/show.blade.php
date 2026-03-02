@extends('layouts.base')
@section('title', 'Tasks show')
@section('content')
    <a href="{{ route('task.index') }}">Back</a>
    <h1>Tasks show</h1>

    <h3>{{ $task->title }}</h3>
    <p>{{ $task->description }}</p>
    <p>{{ $task->price }}</p>
    <p>{{ $task->is_active ? 'Available' : 'It is not available' }}</p>

    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-secondary mb-3">Edit</a>
    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

@endsection