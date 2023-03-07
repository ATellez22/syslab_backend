<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'api'],function(){
    Route::apiResource('/brands', 'BrandController');
    Route::apiResource('/measures', 'MeasureController');
    Route::apiResource('/categories', 'CategoryController');
    Route::apiResource('/documents', 'DocumentController');
    Route::apiResource('/articles', 'ArticleController');
});


