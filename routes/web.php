<?php

use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("/category",[NewsCategoryController::class,'all'])->name('category.all');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
});
Route::get('/newscategories/{newscategory}/users/{user}', [NewsCategoryController::class, 'showPostsByCategory'])
    ->name('newscategories.show');
require __DIR__ . '/Auth/auth.php';
require __DIR__ . '/Post/post.php';
