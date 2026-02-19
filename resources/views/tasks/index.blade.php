@extends('layouts.base')
@section('title', 'Task')
@section('content')
    <h1>New task</h1>
    <a href="{{ route('tasks.create') }}">+ New task</a>
    @foreach ($tasks as $task)
        <div>
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <p>{{ $task->is_completed ? 'Made' : 'No made' }}</p>
            <a href="{{ route('tasks.edit', $task) }}">Updating</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection