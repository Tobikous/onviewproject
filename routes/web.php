<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/review/{id}', [ArticleController::class, 'reviewContent'])->name('review');
Route::get('/onsen/{id}', [ArticleController::class, 'onsenContent'])->name('onsen_content');
Route::get('/onsen_filter', [ArticleController::class, 'filterByArea'])->name('onsen.filter');
Route::get('/review_lists', [ArticleController::class, 'reviewLists'])->name('review_lists');
Route::get('/onsen_lists', [ArticleController::class, 'onsenLists'])->name('onsen_lists');
Route::get('/review_search', [SearchController::class, 'reviewSearch'])->name('review_search');
Route::get('/onsen_search', [SearchController::class, 'onsenSearch'])->name('onsen_search');
Route::get('/tag/{id}', [SearchController::class, 'tagSearch'])->name('tag_search');
Route::get('/onsen_map', [ArticleController::class, 'onsenMap'])->name('onsen_map');

Route::view('/team_of_service', 'team-of-service')->name('team_of_service');
Route::view('/privacy_policy', 'privacy-policy')->name('privacy_policy');


require __DIR__.'/auth.php';
