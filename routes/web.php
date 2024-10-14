<?php

use App\Http\Controllers\CollectionPointController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    // $user = auth()->user();

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sobre', [SiteController::class, 'about'])->name('about');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/contato', function(){})->name('contact');

Route::get('/ecomap',[CollectionPointController::class, 'index'])->name('ecomap.index');
Route::get('/api/ecomap',[CollectionPointController::class, 'list_ecomaps'])->name('ecomap.list');

Route::get('blog/{post}', [PostController::class, 'viewPost'])->name('post.viewPost');

Route::get('author/{author}', [SiteController::class, 'author'])->name('author.show');
Route::post("/blog/post/{post}/comment", [CommentController::class, 'store'])->name('post.comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource("/admin/post", PostController::class);    
    
    Route::delete("/admin/post/{post}/comment", [CommentController::class, 'delete'])->name('post.comment.delete');

    Route::get('/admin/import-collection-points', [CollectionPointController::class, 'import_page'])->name('ecomap.import_page');
    Route::post('/admin/import-collection-points', [CollectionPointController::class, 'import'])->name('ecomap.import');
});


require __DIR__.'/auth.php';
