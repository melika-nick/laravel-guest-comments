<?php
namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostUIController extends Controller
{
    public function indexAdmin()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('posts.index', compact('posts', 'comments'));
    }
    public function indexUser()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('posts.indexUser', compact('posts', 'comments'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->only('title', 'content'));
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->only('title', 'content'));
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
