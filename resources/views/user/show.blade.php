@extends('layouts.base') 
@section('content')
<h1>{{ $user->name }}</h1>
<p>{{ $user->email }}</p>

@if($user->profile)
<h2>Profil</h2>
<p>Bio: {{ $user->profile->bio }}</p>
<p>Phone: {{ $user->profile->phone }}</p>
@else
<p>Profile is not found</p>
@endif

@endsection