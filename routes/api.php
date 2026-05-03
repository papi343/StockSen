<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FournisseurController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MouvementStockController;
use App\Http\Controllers\Admin\DashBoarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('categories',CategoryController::class);
Route::apiResource('fournisseur',FournisseurController::class);
Route::apiResource('produits',ProduitController::class);
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('logout',[AuthController::class,'logout']);
// Route::group(function(){
    Route::get('mouvementStocks', [MouvementStockController::class, 'index']);
    Route::get('mouvementStocks/{id}', [MouvementStockController::class, 'show']);
    Route::post('mouvementStocks', [MouvementStockController::class, 'store']);
    Route::put('mouvementStocks/{id}', [MouvementStockController::class, 'update']);
    Route::delete('mouvementStocks/{id}', [MouvementStockController::class, 'destroy']);
// });
Route::get('dashboard',[DashboarController::class,'index']);