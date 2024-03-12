<?php

use App\Http\Controllers\AdminController;
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
//Homepage base
Route::get('/',[PublicController::class , 'homepage'])->name ('homepage');
// Homepage user login
Route::get('/home',[PublicController::class , 'homepage'])->name ('homepage');
// Article route
Route::get('/article/create', [ArticleController::class, 'create'])->name ('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
// Insert article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{category}/index', [ArticleController::class, 'articlesForcategory'])->name('articles.category');
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
// Show article
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/article/category/{category}' , [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/user/{user}' , [ArticleController::class, 'byUser'])->name('article.byUser');
// Login routes
Route::get('/login',[PublicController::class , 'login'])->name ('login');
// Register routes
Route::get('/register',[PublicController::class , 'register'])->name ('register');
//
Route::get('/{url?}',[PublicController::class , 'navbar'])->name ('navbar');
//
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard' , [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::get('/work-with-us', [PublicController::class, 'workWithUs'])->name('work.with.us');
Route::post('/user/send-role-request', [PublicController::class, 'sendRoleRequest'])->name('user.role.request');
