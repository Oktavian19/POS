<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyKidController;
use App\Http\Controllers\BeautyHealthController;
use App\Http\Controllers\FoodBeverageController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class,'index']);

# Route Prefix
Route::prefix('category')->group(function () { 
    Route::get('/food-beverage', [FoodBeverageController::class,'index']);
    Route::get('/beauty-health',[BeautyHealthController::class,'index']);
    Route::get('/home-care',[HomeCareController::class,'index']);
    Route::get('/baby-kid',[BabyKidController::class,'index']);
});

Route::get('/transaction',[TransactionController::class,'index']);

Route::get('/level',[LevelController::class,'index']);
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/user',[UserController::class,'index']);
Route::get('/user/tambah',[UserController::class,'tambah']);
Route::post('user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);