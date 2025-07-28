<?php
?>
    <!DOCTYPE html>
<html>
<head>
    <title>edit posts</title>
</head>
<body>
<h1>EDIT POSTS</h1>

<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}"><br>
    <textarea name="content">{{ $post->content }}</textarea><br>
    <button type="submit">save</button>
</form>
</body>
</html>

