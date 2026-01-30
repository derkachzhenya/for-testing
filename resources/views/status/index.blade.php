<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status</title>

    <h1>Status</h1>
    <ul>
        <li>
            <a href="/status?role=admin&active=1">
                User active
            </a>
        </li>
        <li>
            <a href="/status?role=editor&active=0">
                User not active
            </a>
        </li>
        <li>
            <a href="/status">
                User
            </a>
        </li>
    </ul>

    <p><strong>User not active</strong> {{ $role }}</p>
    <p><strong>User active</strong> {{ $active }}</p>
</head>

<body>

</body>

</html>