<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // $user = auth()->user();
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource("/admin/post", PostController::class);    
    
    Route::post("/admin/post/{post}/comment", [CommentController::class, 'store'])->name('post.comment.store');
    Route::delete("/admin/post/{post}/comment", [CommentController::class, 'delete'])->name('post.comment.delete');

    Route::get('blog/{post}', [PostController::class, 'viewPost'])->name('post.viewPost');

});


require __DIR__.'/auth.php';
