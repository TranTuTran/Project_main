<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Header</h1>
    <h1>Movie Management - User: {{ Auth::user()->name }} - <a href="{{ route('logout') }}">Logout</a></h1>
    <h1>Footer</h1>
</body>
</html>