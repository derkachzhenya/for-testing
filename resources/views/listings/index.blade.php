@extends('layouts.base')
@section('title', 'Listing')
@section('content')
    <h1>Listing</h1>
    <a href="{{ route('listing.create') }}">Create new listing</a>
    @foreach ($listings as $listing)
        <h3><a class="mt-3" href="{{ route('listing.show', $listing) }}">{{ $listing->title }}</a></h3>
        <p>{{ $listing->descriptin }}</p>
        <p>Price: ${{ $listing->price }}</p>
        <p>{{ $listing->is_active ? 'The product is available' : 'The product is unavailable' }}</p>
        <form action="{{ route('listing.destroy', $listing->id) }}" method = "POST">
            @csrf
            @method('DELETE')
            <button class="mt-3 btn btn-success" type="submit">Delete</button>
        </form>
    @endforeach
@endsection