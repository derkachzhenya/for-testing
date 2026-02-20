@extends('layouts.base')
@section('title', 'Listing create')
@section('content')
    <h1>Create new listing</h1>
    <a href="{{ route('listing.index') }}">Back</a>
    <form action={{ route('listing.store') }} method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-3 my-3">
                <input class="form-control" type="text" name="title" placeholder="Tilte">
                <textarea class="form-control mt-3" name="description" placeholder="Description"></textarea>
                <input class="form-control mt-3" type="text" name="price" placeholder="Price">
                <label class="mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active">
                    Default checkbox
                </label><br>
                <button class="mt-3 btn btn-success" type="submit">Create</button>
            </div>
        </div>
    </form>
@endsection