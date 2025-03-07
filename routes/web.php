<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyKidController;
use App\Http\Controllers\BeautyHealthController;
use App\Http\Controllers\FoodBeverageController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class,'index']);

# Route Prefix
Route::prefix('category')->group(function () { 
    Route::get('/food-beverage', [FoodBeverageController::class,'index']);
    Route::get('/beauty-health',[BeautyHealthController::class,'index']);
    Route::get('/home-care',[HomeCareController::class,'index']);
    Route::get('/baby-kid',[BabyKidController::class,'index']);
});

# Route Param
Route::get('/user/{id}/name/{name}',[UserController::class,'index']);

Route::get('/transaction',[TransactionController::class,'index']);
