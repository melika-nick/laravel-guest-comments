<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Welcome, {{ auth()->user()->name }}</h1>

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

<p><a href="{{ route('posts.index') }}">Manage Posts</a></p>
<p><a href="{{ route('comments.index') }}">Manage Comments</a></p>
</body>
</html>
