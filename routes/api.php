<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categorie', [CategorieController::class, "index"]);
Route::post('/categorie', [CategorieController::class, "store"]);
Route::get('/categorie/{id}', [CategorieController::class, "show"]);
Route::delete('/categorie/{id}', [CategorieController::class, "destroy"]);