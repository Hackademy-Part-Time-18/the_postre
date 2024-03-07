<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PublicController::class , 'homepage'])->name ('homepage');
Route::get('/article/create', [ArticleController::class, 'create'])->name ('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
<<<<<<< HEAD
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->namw('articles.show');
Route::get('/articles/{category}/index', [ArticleController::class, 'articlesForcategory'])->name('articles.category');
=======
//test
>>>>>>> 48586d9fa2e09d4b16e404a526fe19ef8d95bb6a
