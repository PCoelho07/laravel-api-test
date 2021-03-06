<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('products')->group(function () {

    Route::get('/', 'ProdutoController@index');
    Route::get('/{product}','ProdutoController@show');
    Route::post('/', 'ProdutoController@store');
    Route::put('/{product}', 'ProdutoController@update');
    Route::delete('/{product}', 'ProdutoController@destroy');

});
