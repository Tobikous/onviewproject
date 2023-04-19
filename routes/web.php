<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/review/{id}', [ArticleController::class, 'reviewContent'])->name('review');
Route::get('/articles', [ArticleController::class, 'article'])->name('articles');
Route::get('/search', [ArticleController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
