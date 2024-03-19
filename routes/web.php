<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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
// Show article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/user/{user}' , [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/article/category/{category}' , [ArticleController::class, 'byCategory'])->name('articles.category');
// Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
// Route::get('/articles/{category}/index', [ArticleController::class, 'byCategory'])->name('articles.category');
// Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
// Login routes
Route::get('/login',[PublicController::class , 'login'])->name ('login');
// Register routes
Route::get('/register',[PublicController::class , 'register'])->name ('register');
//
Route::get('/work-with-us', [PublicController::class, 'workWithUs'])->name('work.with.us');
Route::post('/user/send-role-request', [PublicController::class, 'sendRoleRequest'])->name('user.role.request');
Route::post('/invia-mail',[PublicController::class, 'send'])->name('send');
//
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard' , [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'makeUserRevisor'])->name('admin.makeUserRevisor');
    Route::get('/admin/{user}/set-admin' , [AdminController::class, 'makeUserAdmin'])->name('admin.makeUserAdmin');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'makeuserWriter'])->name('admin.makeUserWriter');
});
Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class,  'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
});
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard' , [RevisorController::class, 'revisorDashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'articleDetail'])->name('revisor.detail');
    Route::get('/revisor/article/{article}/accept' , [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
    Route::get('/revisor/article/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
});
Route::get('/article/search' , [PublicController::class, 'searchArticle'])->name('search.articles');
// sidebar
Route::get('/user',[PublicController::class , 'user'])->name ('user');