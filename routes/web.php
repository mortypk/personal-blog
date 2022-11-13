<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class,'index'])->name('home');
Route::view('/about','about')->name('about');

Route::middleware(['auth'])->group(function () {
    Route::get('/article/dashboard', [ArticleController::class,'dashboard'])->name('article.dashboard');
    Route::resource('article',ArticleController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('tag',TagController::class);
    Route::view('/dashboard','dashboard')->name('dashboard');
});


require __DIR__.'/auth.php';
