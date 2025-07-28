<?php
?>
    <!DOCTYPE html>
<html>
<head>
    <title>create post</title>
</head>
<body>
<h1>CREATE A NEW POST</h1>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <input type="text" name="title" placeholder="title"><br>
    <br>
    <textarea name="content" placeholder="content"></textarea><br>
    <br>
    <button type="submit">create</button>
    <br><br>
    <a href="{{ route('posts.index') }}">back</a>
</form>
</body>
</html>
