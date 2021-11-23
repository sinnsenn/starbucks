<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/starbucks/home','Admin\StarbucksController@home')->name('login');
Route::get('admin/starbucks/review','Admin\StarbucksController@review');
Route::post('admin/starbucks/review','Admin\StarbucksController@create');
Route::get('admin/starbucks', 'Admin\StarbucksController@index');
Route::get('admin/starbucks/edit', 'Admin\StarbucksController@edit');
Route::post('admin/starbucks/edit','Admin\StarbucksController@update');
Route::get('starbucks/delete', 'Admin\StarbucksController@delete');