<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*Route::get('/categorie', [CategorieController::class, "index"]);
Route::post('/categorie', [CategorieController::class, "store"]);
Route::get('/categorie/{id}', [CategorieController::class, "show"]);
Route::delete('/categorie/{id}', [CategorieController::class, "destroy"]);
Route::put('/categorie/{id}', [CategorieController::class, "update"]);*/

route::middleware('api')->group(function(){
Route::Resource('/categorie',CategorieController::class);

});

route::middleware('api')->group(function(){
    Route::Resource('/scategorie',ScategorieController::class);
    
    
    });

    route::middleware('api')->group(function(){
        Route::Resource('/articles',ArticleController::class);
        
        
        });