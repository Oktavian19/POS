<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

# Route Prefix
Route::prefix('category')->group(function () { 
    Route::get('/food-beverage', function () {
        return view('food-beverage');
    });
    Route::get('/beauty-health', function () {
        return view('beauty-health');
    });
    Route::get('/home-care', function () {
        return view('home-care');
    });
    Route::get('/baby-kid', function () {
        return view('baby-kid');
    });
});

# Route Param
Route::get('/user/{id}/name/{name}', function ($id, $name) {
    return view('User dengan nama '.$name.' memiliki id '.$id);
});

Route::get('/transaction', function () {
    return view('transaction');
});
