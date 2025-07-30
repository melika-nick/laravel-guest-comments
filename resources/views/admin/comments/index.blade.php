<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Comments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .comment-box {
            background-color: #fff;
            border: 1px solid #ccc;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .post-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .comment-author {
            color: #2980b9;
            font-weight: bold;
        }
        .comment-body {
            margin: 5px 0 10px;
        }
        .approved {
            color: green;
            font-weight: bold;
        }
        .approve-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .approve-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>📝 Manage Comments</h1>

@if(session('message'))
    <div style="background-color:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:20px;">
        {{ session('message') }}
    </div>
@endif

@forelse($comments as $comment)
    <div class="comment-box">
        <div class="post-title">📌 For Post: {{ $comment->post->title }}</div>

        <div class="comment-author">{{ $comment->author_name }}</div>
        <div class="comment-body">{{ $comment->body }}</div>

        @if(!$comment->approved)
            <form method="POST" action="{{ route('admin.comments.approve', $comment->id) }}">
                @csrf
                @method('PUT')
                <button class="approve-btn" type="submit">✅ Approve</button>
            </form>
        @else
            <div class="approved">✅ Approved</div>
        @endif
    </div>
@empty
    <p>No comments found.</p>
@endforelse

</body>
</html>

