<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>

    <p><strong>User:</strong> {{ $user->name }} ({{ $user->slug }})</p>
    <p><strong>Post slug:</strong> {{ $post->slug }}</p>
</body>
</html>