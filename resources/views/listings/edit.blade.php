@extends('layouts.base')
@section('title', 'Listing edit')
@section('content')
    <h1>Edit listing</h1>
    <a href="{{ route('listing.index') }}">Back</a>
    <form action={{ route('listing.update', $listing->id) }} method="POST">
        @csrf
        @method("PUT")
        <div class="row justify-content-center">
            <div class="col-lg-3 my-3">
                <input class="form-control" type="text" name="title" value="{{ $listing->title }}">
                <textarea class="form-control mt-3" name="description">{{ $listing->description }}</textarea>
                <input class="form-control mt-3" type="text" name="price" value="{{ $listing->price }}">
                <label class="mt-3">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $listing->is_active ? 'checked' : '' }}>
                    Active
                </label><br>
                <button class="mt-3 btn btn-success" type="submit">Edit</button>
            </div>
        </div>
    </form>

@endsection