<?php

use Illuminate\Support\Facades\Route;

/* pour DB librairie*/
use Illuminate\Support\Facades\DB;

/* Pour les langues */
use App\Http\Controllers\LocalizationController;

use \App\Http\Controllers\IndexController;

/* Pour se connecter */
use App\Http\Controllers\CustomAuthController ;

/* Pour le forum */
use \App\Http\Controllers\ArticleController;

/* Pour les documents */
use \App\Http\Controllers\DocumentController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [IndexController::class,'index'])->name("etudiant.index");

Route::get('/show/{etudiant}', [IndexController::class,'show'])->name("etudiant.show");
Route::delete('/show/{etudiant}', [IndexController::class,'destroy'])->name("etudiant.destroy")->middleware('auth');

Route::get('/create', [IndexController::class,'create'])->name("etudiant.create");
Route::post('/create', [IndexController::class,'store'])->name("etudiant.store");

Route::get('/edit/{etudiant}', [IndexController::class,'edit'])->name("etudiant.edit")->middleware('auth');
Route::put('/edit/{etudiant}', [IndexController::class,'update'])->name("etudiant.update")->middleware('auth');

Route::get('/langue/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/articles', [ArticleController::class,'index'])->name("article.index")->middleware('auth');
Route::get('/articles/create', [ArticleController::class,'create'])->name("article.create")->middleware('auth');
Route::post('/articles/create', [ArticleController::class,'store'])->name("article.store")->middleware('auth');
Route::get('/articles/edit/{article}', [ArticleController::class,'edit'])->name("article.edit")->middleware('auth');
Route::put('/articles/edit/{article}', [ArticleController::class,'update'])->name("article.update")->middleware('auth');
Route::delete('/articles/{article}', [ArticleController::class,'destroy'])->name("article.destroy")->middleware('auth');

Route::get('/documents', [DocumentController::class,'index'])->name("document.index")->middleware('auth');
Route::get('/documents/create', [DocumentController::class,'create'])->name("document.create")->middleware('auth');
Route::post('/documents/create', [DocumentController::class,'store'])->name("document.store")->middleware('auth');
Route::get('/documents/edit/{document}', [DocumentController::class,'edit'])->name("document.edit")->middleware('auth');
Route::put('/documents/edit/{document}', [DocumentController::class,'update'])->name("document.update")->middleware('auth');
Route::get('/documents/download/{document}', [DocumentController::class,'download'])->name("document.download")->middleware('auth');
Route::delete('/documents/{document}', [DocumentController::class,'destroy'])->name("document.destroy")->middleware('auth');

