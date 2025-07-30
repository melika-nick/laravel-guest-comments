<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\CommentController as UserCommentController;

Route::controller(AdminPostController::class)->prefix('admin/posts')->name('posts.')->group(function (){
    Route::get('/', [AdminPostController::class, 'index'])->name('index');
    Route::get('/create', [AdminPostController::class, 'create'])->name('create');
    Route::post('/store', [AdminPostController::class, 'store'])->name('store');
    Route::get('/{post}/edit', [AdminPostController::class, 'edit'])->name('edit');
    Route::put('/{post}', [AdminPostController::class, 'update'])->name('update');
    Route::delete('/{post}', [AdminPostController::class, 'destroy'])->name('destroy');
});
Route::controller(AdminCommentController::class)->prefix('admin/comments')->name('comments.')->group(function (){
    Route::get('/', [AdminCommentController::class, 'index'])->name('index');
    Route::put('/{comment}/approve', [AdminCommentController::class, 'approve'])->name('approve');
});

Route::get('user/index', [UserPostController::class, 'index']);
Route::post('user/posts/{post}/comments', [UserCommentController::class, 'store']);
