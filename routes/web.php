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

Route::get('/','Admin\StarbucksController@home');
Route::get('admin/starbucks/review','Admin\StarbucksController@review');
Route::post('admin/starbucks/review','Admin\StarbucksController@create');
Route::get('admin/starbucks', 'Admin\StarbucksController@index');
Route::get('admin/starbucks/edit', 'Admin\StarbucksController@edit');
Route::post('admin/starbucks/edit','Admin\StarbucksController@update');
Route::get('admin/starbucks/delete', 'Admin\StarbucksController@delete');
Route::get('admin/starbucks/reviewdrink','Admin\StarbucksController@reviewdrink');
Route::post('admin/starbucks/reviewdrink','Admin\StarbucksController@createdrink');
Route::get('admin/starbucksdrink','Admin\StarbucksController@indexdrink');
Route::get('admin/starbucks/editdrink','Admin\StarbucksController@editdrink');
Route::post('admin/starbucks/editdrink','Admin\StarbucksController@updatedrink');
Route::get('admin/starbucks/deletedrink','Admin\StarbucksController@deletedrink');

Route::get('starbucks', 'General\StarbucksController@index');
Route::get('starbucksdrink','General\StarbucksController@indexdrink');