@extends('layouts.base')
@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>

<h2>Коментарі ({{ $post->comments->count() }})</h2>

@foreach ($post->comments as $comment)
    <div>
        <p>{{ $comment->body }}</p>
        <small>{{ $comment->created_at }}</small>
    </div>
@endforeach

<h3>Додати коментар</h3>
<form action="{{ route('comment.store', $post->id) }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Ваш коментар"></textarea>
    <button type="submit">Button</button>
</form>
@endsection