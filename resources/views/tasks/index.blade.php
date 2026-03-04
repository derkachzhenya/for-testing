@extends('layouts.base')
@section('title', 'Tasks')
@section('content')
    <a href="{{ route('task.create') }}" class="btn btn-secondary mb-3">Create</a>
    <h1>Tasks</h1>
    @foreach ($tasks as $task)
        <h3><a href="{{ route('task.show', $task->id) }}">{{ $task->title }}</a></h3>
        <p>{{ $task->description }}</p>
        <p>{{ $task->price }}</p>
         <p>{{ $task->is_active ? 'Available' : 'It is not available' }}</p>
         <p>User: {{ $task->user->name }}</p>
         <p>Email: {{ $task->user->email }}</p>
    @endforeach

@endsection