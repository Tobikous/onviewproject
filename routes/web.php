<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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

// Route::get('/homeGuest', [GuestController::class, 'index'])->name('homeGuest');
// Route::get('/showGuest/{id}', [GuestController::class, 'show'])->name('showGuest');
// Route::get('/articleGuest', [GuestController::class, 'article'])->name('articleGuest');
Route::get('/maps', [GuestController::class, 'maps'])->name('maps');

Route::get('/show/{id}', [ArticleController::class, 'show'])->name('show');
Route::get('/article', [ArticleController::class, 'article'])->name('article');

// Route::get('/login/guest', function () {
//     auth()->loginUsingId(1);
//     return redirect('/');
// })->name('login.guest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
