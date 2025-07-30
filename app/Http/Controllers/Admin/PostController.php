<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('admin.posts.index', compact('posts', 'comments'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->only('title', 'content'));
        return redirect()->route('admin.posts.index');
    }
}
