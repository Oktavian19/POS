<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'levels'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{level}', [LevelController::class, 'show']);
    Route::put('/{level}', [LevelController::class, 'update']);
    Route::delete('/{level}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{level}', [UserController::class, 'show']);
    Route::put('/{level}', [UserController::class, 'update']);
    Route::delete('/{level}', [UserController::class, 'destroy']);
}); 

Route::group(['prefix' => 'kategoris'], function() {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{level}', [KategoriController::class, 'show']);
    Route::put('/{level}', [KategoriController::class, 'update']);
    Route::delete('/{level}', [KategoriController::class, 'destroy']);
}); 

Route::group(['prefix' => 'barangs'], function() {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{level}', [BarangController::class, 'show']);
    Route::put('/{level}', [BarangController::class, 'update']);
    Route::delete('/{level}', [BarangController::class, 'destroy']);
}); 

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware(['auth:api'])->get('/userrr', function (Request $request) {
    return $request->user();
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
