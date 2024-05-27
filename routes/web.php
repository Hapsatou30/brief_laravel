<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles', [ArticleController::class, 'liste_articles']);
Route::get('/Add', [ArticleController::class, 'AddArticle']);
Route::post('/Add/traitement', [ArticleController::class, 'traitementAdd']);
Route::get('/update/{id}', [ArticleController::class, 'updateArticle']);
Route::post('/update/traitement', [ArticleController::class, 'traitementupdate']);
Route::get('/delete{id}', [ArticleController::class, 'deleteArticle']);
Route::get('/show/{id}', [ArticleController::class, 'showDetails']);
