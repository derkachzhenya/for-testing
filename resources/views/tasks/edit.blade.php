@extends('layouts.base')
@section('title', 'Task edit')
@section('content')
  <h1>Edit task</h1>
  <form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}"><br>
    <textarea name="description">{{ $task->description }}</textarea><br>
    <label>
        <input type="checkbox" name="is_completed" value="1"
        {{ $task->is_completed ?  'checked' : ''}}>
        Ok
    </label><br>
    <button type="submit">Save</button>
  </form>

  <a href="{{ route('tasks.index') }}"><-Back</a>
@endsection