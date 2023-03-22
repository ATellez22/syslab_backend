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
    //Envia un parametro que seria el id del articulo, y el controlador apunta a la funcion kardex
    //Se utiliza en 'modules/kardex/_id' de Nuxt para listar los datos del articulo y llenar el v-model.
    Route::get('/inventories/kardex/{article}', 'InventoryController@kardex');
    Route::apiResource('/inventories', 'InventoryController');
});


