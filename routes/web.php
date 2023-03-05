<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('/api/articles', 'ArticleController');
Route::apiResource('/api/brands', 'BrandController');
Route::apiResource('/api/measures', 'MeasureController');
Route::apiResource('/api/categories', 'CategoryController');
