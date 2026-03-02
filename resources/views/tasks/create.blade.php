@extends('layouts.base')
@section('title', 'Tasks create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">

                <h1 class="text-center mb-4">Create new task</h1>

                <form action="{{ route('task.store') }}" method="POST">
                    @csrf

                    <input type="text" name="title" placeholder="Title" class="form-control mb-3">

                    <textarea name="description" placeholder="Text" class="form-control mb-3"></textarea>

                    <input type="text" name="price" placeholder="Price" class="form-control mb-3">

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active">
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>

                    <button type="submit" class="btn btn-secondary w-100">
                        Create
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection