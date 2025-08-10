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

<p><a href="{{ route('admin.posts.index') }}">Manage Posts</a></p>
<p><a href="{{ route('admin.comments.index') }}">Manage Comments</a></p>
</body>
</html>
