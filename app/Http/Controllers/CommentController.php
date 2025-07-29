<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Post::all();
    }
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

        return back()->with('message', 'دیدگاه شما ثبت شد و بعد از تایید نمایش داده خواهد شد.');
    }

}
