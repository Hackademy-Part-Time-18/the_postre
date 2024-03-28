<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
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
//User Profilo
Route::get('/home',[PublicController::class , 'user'])->name ('user');
Route::post('/user/upload-profile-image', [UserController::class, 'uploadProfileImage'])->name('user.uploadProfileImage');
// Article route
Route::get('/article/create', [ArticleController::class, 'create'])->name ('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
// Show article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/user/{user}' , [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/article/category/{category}' , [ArticleController::class, 'byCategory'])->name('article.bycategory');
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
    Route::patch('/admin/{user}/set-admin' , [AdminController::class , 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor' , [AdminController::class , 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer' , [AdminController::class , 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/{tag}/tag' , [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag' , [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category' , [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category' , [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store' , [AdminController::class , 'storeCategory'])->name('admin.storeCategory');
});
Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class,  'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/writerr/dashboard' , [WriterController::class , 'dashboard'])->name('writer.dashboard');
    Route::get('/article/{article}/edit' , [ArticleController::class , 'edit'])->name('article.edit');
    Route::put('/article/{article}/update' , [ArticleController::class , 'update'])->name('article.update');
    Route::delete('/article/{article}/destroy' , [ArticleController::class, 'destroy'])->name('article.destroy');
});
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard' , [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'articleDetail'])->name('revisor.detail');
    Route::post('/revisor/{article}/accept' , [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
    Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
});
Route::get('/article/search' , [PublicController::class, 'searchArticle'])->name('search.articles');
// sidebar
Route::get('/articles',[PublicController::class , 'articles'])->name ('articles');