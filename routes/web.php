<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\isAdmin;

Route::resource('admin/posts',AdminPostController::class);

Route::controller(AdminCommentController::class)->prefix('admin/comments')->name('comments.')->group(function (){
    Route::get('/', [AdminCommentController::class, 'index'])->name('index');
    Route::put('/{comment}/approve', [AdminCommentController::class, 'approve'])->name('approve');
});

Route::get('user/index', [UserPostController::class, 'index']);
Route::post('user/posts/{post}/comments', [UserCommentController::class, 'store']);

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

//Route::get('login', [AuthController::class, 'showLoginForm']);//->middleware('guest')->name('admin.login');
//Route::post('admin/login/submit', [AuthController::class, 'login'])->name('admin.login.submit');//->middleware('guest')->name('admin.login');
