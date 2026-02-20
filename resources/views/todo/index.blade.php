@extends('layouts.base')
@section('title', 'Todo')
@section('content')
    <div class="border">
        <h1>New todo</h1>
        <a href="{{ route('todo.create') }}">Create new todo list</a>
        @foreach ($todos as $todo)
            <div>
                <h3>{{ $todo->title }}</h3>
                <p>{{ $todo->description }}</p>
                <p>{{ $todo->is_completed ? 'This todo was made' : 'This todo was not made'}}</p>
                <a href="{{ route('todo.edit', $todo) }}">Update</a>
                <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
