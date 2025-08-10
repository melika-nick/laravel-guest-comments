<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\Admin\AuthController;

// ======================
// Admin Authentication
// ======================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/login', function () {
    return redirect()->route('admin.login.form');
})->name('login');

// ======================
// Admin Panel (Protected)
// ======================
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Posts Management
    Route::resource('posts', AdminPostController::class);

    // Comments Management
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [AdminCommentController::class, 'index'])->name('index');
        Route::put('/{comment}/approve', [AdminCommentController::class, 'approve'])->name('approve');
    });
});

// ======================
// User Side (Public)
// ======================
Route::get('user/index', [UserPostController::class, 'index'])->name('user.posts.index');
Route::post('user/posts/{post}/comments', [UserCommentController::class, 'store'])->name('user.comments.store');
