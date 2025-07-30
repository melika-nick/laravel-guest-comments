<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->latest()->get();
        return view('admin.comments.index', compact('comments'));
    }
    public function approve(Comment $comment)
    {
        $comment->update([
            'approved' => true
        ]);

        return redirect()->back()->with('message', 'Comment approved successfully.');
    }
}
