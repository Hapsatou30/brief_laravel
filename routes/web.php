<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/items', [ItemController::class, 'listItems']);
Route::get('/add', [ItemController::class, 'addItems']);
Route::post('/add/processing', [ItemController::class, 'processingAdd']);
Route::get('/update/{id}', [ItemController::class, 'updateItem']);
Route::post('/update/processing', [ItemController::class, 'processingUpdate']);
Route::get('/delete{id}', [ItemController::class, 'deleteItem']);
Route::get('/show/{id}', [ItemController::class, 'showDetails']);
