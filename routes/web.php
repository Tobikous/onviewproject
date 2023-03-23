<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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

Route::get('/', function () {
    return view('login');
});

// Route::get('/homeGuest', [GuestController::class, 'index'])->name('homeGuest');
// Route::get('/showGuest/{id}', [GuestController::class, 'show'])->name('showGuest');
// Route::get('/articleGuest', [GuestController::class, 'article'])->name('articleGuest');
Route::get('/maps', [GuestController::class, 'maps'])->name('maps');

Route::get('/login/guest', function () {
    auth()->loginUsingId(1);
    return redirect('/');
})->name('login.guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('create');
// Route::post('/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('store');
// Route::get('/show/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('show');
// Route::get('/article', [App\Http\Controllers\ArticleController::class, 'article'])->name('article');
// Route::get('/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('edit');
// Route::post('/update/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('update');
// Route::post('/delete/{id}', [App\Http\Controllers\ArticleController::class, 'delete'])->name('delete');

require __DIR__.'/auth.php';
