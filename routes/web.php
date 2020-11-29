<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "Backend\DashboardController@index");
Route::get('/backend/product/index', "Backend\ProductsController@index");
Route::get('/backend/product/create', "Backend\ProductsController@create");
Route::get('/backend/product/edit/{id}', "Backend\ProductsController@edit");
Route::get('/backend/product/delete/{id}', "Backend\ProductsController@delete");


Route::post('/backend/product/store', "Backend\ProductsController@store");
Route::post('/backend/product/update/{id}', "Backend\ProductsController@update");

// xóa sản phẩm
Route::post('/backend/product/destroy/{id}', "Backend\ProductsController@destroy");



