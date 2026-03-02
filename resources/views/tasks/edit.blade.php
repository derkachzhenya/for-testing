@extends('layouts.base')
@section('title', 'Tasks edit')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('task.index') }}">Back</a>

                <h1 class="text-center mb-4">Update task</h1>

                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $task->title }}" class="form-control mb-3">

                    <textarea name="description" class="form-control mb-3">{{ $task->description }}</textarea>

                    <input type="text" name="price" value="{{ $task->price }}" class="form-control mb-3">

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $task->is_active ? "Checked" : "" }}>
                        <label class="form-check-label">
                            Active
                        </label>
                    </div>

                    <button type="submit" class="btn btn-secondary w-100">
                        Edit
                    </button>
                </form>

            </div>
        </div>
    </div>

@endsection