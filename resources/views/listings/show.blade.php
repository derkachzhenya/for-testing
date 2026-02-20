@extends('layouts.base')
@section('title', 'Listing show')
@section('content')
<a href="{{ route('listing.index') }}">Back</a>
    <h1>Show listings</h1>
    <h2>{{ $listing->title }}</h2>
    <p>{{ $listing->descriptin }}</p>
    <p>Price: ${{ $listing->price }}</p>
    <p>{{ $listing->is_active ? 'The product is available' : 'the product is unavailable' }}</p>
    <a href="{{ route('listing.edit', $listing) }}">Edit</a>

@endsection