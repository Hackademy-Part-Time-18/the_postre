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
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{category}/index', [ArticleController::class, 'articlesForcategory'])->name('articles.category');
Route::get('/login',[PublicController::class , 'login'])->name ('login');
Route::get('/register',[PublicController::class , 'register'])->name ('register');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
