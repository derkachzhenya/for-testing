<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category role</title>
</head>

<body>
    <h1>Category page</h1>
    <h2>Links</h2>

    <ul>
        <li>
            <a href="/category?role=admin&active=1">
                Admin user
            </a>
        </li>
        <li>
            <a href="/category?role=editor&active=0">
                Editor users
            </a>
        </li>
        <li>
            <a href="/category">
            User
            </a>
        </li>
    </ul>

    <h2>Current filter</h2>

    <p><strong>Role:</strong>{{ $role }}</p>
    <p><strong>Active</strong>{{ $active }}</p>
</body>

</html>
