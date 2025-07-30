<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\UI\PostUIController;
//use App\Http\Controllers\CommentController;

Route::controller(PostUIController::class)->prefix('admin/posts')->name('posts.')->group(function () {
    Route::get('/', 'indexAdmin')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::put('/{post}', 'update')->name('update');
    Route::delete('/{post}', 'destroy')->name('destroy');
});
Route::get('admin/posts', [AdminPostController::class, 'index'])->name('admin.posts');

Route::get('user/index', [UserPostController::class, 'index']);
Route::post('posts/{post}/comments', [UserCommentController::class, 'store']);

Route::get('admin/comments', [AdminCommentController::class, 'index']);
Route::put('admin/comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('admin.comments.approve');;
