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

Route::get('/', 'AdminController@index');
Route::get('/leads', 'LeadController@index');
Route::post('/leads', 'LeadController@store');
Route::get('/leads/create', 'LeadController@create');
Route::get('/leads/search', 'LeadController@search');
Route::get('/leads/{lead}/edit', 'LeadController@edit');
Route::get('/leads/{lead}/delete', 'LeadController@delete');
Route::get('/leads/{lead}', 'LeadController@show');
Route::put('/leads/{lead}', 'LeadController@update');
Route::delete('/leads/{lead}', 'LeadController@destroy');
