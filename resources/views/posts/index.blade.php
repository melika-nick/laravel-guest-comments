<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <h1>POSTS</h1>
    <ul>
    @foreach($posts as $post)
        <li>
            <strong>{{ $post->title }}</strong><br>
            {{ $post->content }}<br>
            <a href="{{ route('posts.edit', $post) }}">edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
        </li>
        <br>
        @endforeach
    <br><br>
    <a href="{{ route('posts.create') }}">create new post</a>

    </ul>
</body>
</html>
