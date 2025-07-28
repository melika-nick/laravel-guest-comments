<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            color: #333;
            padding: 20px;
        }
        .post {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .post-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .post-content {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .comment {
            background-color: #f0f0f0;
            border-left: 4px solid #3498db;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .comment-author {
            font-weight: bold;
            margin-bottom: 5px;
            color: #2980b9;
        }
        .no-comments {
            color: #999;
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h1 style="color:#2c3e50;">📄 Posts</h1>

@foreach($posts as $post)
    <div class="post">
        <div class="post-title">{{ $post->title }}</div>
        <div class="post-content">{{ $post->content }}</div>

        @php
            $approvedComments = $post->comments()->where('approved', true)->latest()->get();
        @endphp

        @if($approvedComments->isNotEmpty())
            <h4 style="color: #34495e;">💬 Comments:</h4>
            @foreach($approvedComments as $comment)
                <div class="comment">
                    <div class="comment-author">{{ $comment->author_name }}</div>
                    <div class="comment-body">{{ $comment->body }}</div>
                </div>
            @endforeach
        @else
            <p class="no-comments">No comments for this post yet.</p>
        @endif
    </div>
@endforeach

</body>
</html>
