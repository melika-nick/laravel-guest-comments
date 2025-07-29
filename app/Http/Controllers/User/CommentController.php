<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'author_name' => 'required',
            'body' => 'required',
        ]);

        $post->comments()->create([
            'author_name' => $request->author_name,
            'body' => $request->body,
            'approved' => false, // هنوز تایید نشده
        ]);

        return back()->with('message', 'Thank you! Your comment has been received and will appear once approved.');
    }
}
