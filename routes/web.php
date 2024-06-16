<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',  [TestController::class, 'index']);
Route::any('/{any}', [TestController::class, 'index']);

/*
Route::get('/newarticle', function() {
    return view('newArticle');
});

Route::get('/testdata',[TestController::class,'index']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');
Route::get('/articles', [ArticleController::class, 'index']);
Route::post('/articles', [ArticleController::class, 'store'] );
*/
