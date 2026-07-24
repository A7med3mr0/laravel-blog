<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
