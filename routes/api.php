<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FournisseurController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('categories',CategoryController::class);
Route::apiResource('fournisseurs',FournisseurController::class);
Route::apiResource('produits',ProduitController::class);
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('logout',[AuthController::class,'logout']);