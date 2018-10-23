<?php

use App\User;

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

Route::middleware(['auth'])->group(function(){
	Route::get('/admin', 'Admin\AdminController@index');
	Route::get('/admin/leads', 'Admin\LeadController@index');
	Route::post('/admin/leads', 'Admin\LeadController@store');

	Route::get('/admin/leads/create', 'Admin\LeadController@create');
	Route::get('/admin/leads/search', 'Admin\LeadController@search');
	Route::get('/admin/leads/{lead}', 'Admin\LeadController@show');
	Route::get('/admin/leads/{lead}/edit', 'Admin\LeadController@edit');
	Route::put('/admin/leads/{lead}', 'Admin\LeadController@update');
	Route::get('/admin/settings', function(){
		return view('admin.settings.index');
	});
});

Route::middleware(['auth', 'checkPermission:manage-users'])->group(function(){
	Route::get('/admin/settings/users/create', 'Admin\Settings\UserController@create');
	Route::get('/admin/settings/users', 'Admin\Settings\UserController@index');
	Route::post('/admin/settings/users', 'Admin\Settings\UserController@store');
	Route::put('/admin/settings/users/{user}/change-password', 'Admin\Settings\UserController@change_password');
	Route::get('/admin/settings/users/{user}/edit', 'Admin\Settings\UserController@edit');
	Route::get('/admin/settings/users/{user}/delete', 'Admin\Settings\UserController@delete');
	Route::put('/admin/settings/users/{user}', 'Admin\Settings\UserController@update');
	Route::delete('/admin/settings/users/{user}', 'Admin\Settings\UserController@destroy');
});

Route::middleware(['auth', 'checkPermission:manage-testimonials'])->group(function(){
	Route::get('/admin/testimonials', 'Admin\TestimonialController@index');
	Route::get('/admin/testimonials/create', 'Admin\TestimonialController@create');
	Route::post('/admin/testimonials', 'Admin\TestimonialController@store');
	Route::get('/admin/testimonials/{testimonial}/edit', 'Admin\TestimonialController@edit');
	Route::put('/admin/testimonials/{testimonial}', 'Admin\TestimonialController@update');
	Route::get('/admin/testimonials/{testimonial}/delete', 'Admin\TestimonialController@delete');
	Route::delete('/admin/testimonials/{testimonial}', 'Admin\TestimonialController@destroy');
});

Route::middleware(['auth', 'checkPermission:manage-emails'])->group(function(){
	Route::get('/admin/settings/emails', 'Admin\Settings\EmailController@index');
	Route::post('/admin/settings/emails', 'Admin\Settings\EmailController@store');
	Route::delete('/admin/settings/emails/{email}', 'Admin\Settings\EmailController@update');
});

Route::middleware(['auth', 'checkPermission:manage-leads'])->group(function(){

	Route::get('/admin/leads/{lead}/delete', 'Admin\LeadController@delete');

});



Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
