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

Route::get('/', function(){
	return redirect('/admin/leads');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/leads', 'LeadController@index');
Route::post('/admin/leads', 'LeadController@store');
Route::get('/admin/leads/create', 'LeadController@create');
Route::get('/admin/leads/search', 'LeadController@search');
Route::get('/admin/leads/{lead}/edit', 'LeadController@edit');
Route::get('/admin/leads/{lead}/delete', 'LeadController@delete');
Route::get('/admin/leads/{lead}', 'LeadController@show');
Route::put('/admin/leads/{lead}', 'LeadController@update');
Route::delete('/admin/leads/{lead}', 'LeadController@destroy');
