<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\UI\PostUIController;
use App\Http\Controllers\CommentController;

Route::controller(PostUIController::class)->prefix('admin/posts')->name('posts.')->group(function () {
    Route::get('/', 'indexAdmin')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::put('/{post}', 'update')->name('update');
    Route::delete('/{post}', 'destroy')->name('destroy');
});
//Route::post('user/posts', [CommentController::class, 'store'])->name('comments.store');
Route::get('user/index', [PostUIController::class, 'indexUser']);
