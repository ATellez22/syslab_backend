<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'api'],function(){
    //Validación de usuario
    Route::post('/login', 'UserController@login');
    Route::apiResource('/users', 'UserController');
    //Validación de usuario

    Route::apiResource('/brands', 'BrandController');
    Route::apiResource('/measures', 'MeasureController');
    Route::apiResource('/categories', 'CategoryController');
    Route::apiResource('/documents', 'DocumentController');
    Route::apiResource('/articles', 'ArticleController');
    Route::apiResource('/inventories', 'InventoryController');

    //Envia un parametro que seria el id del articulo, y el controlador apunta a la funcion kardex.
    Route::get('/inventories/kardex/{article}', 'InventoryController@kardex');
    //Se utiliza en 'modules/kardex/_id' de Nuxt para listar los datos del articulo y llenar el v-model.

    Route::apiResource('/purchases', 'PurchaseController');

});


