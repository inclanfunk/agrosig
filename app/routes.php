<?php

// Logged in users cannot access these routes. Only guests.
Route::group(['before' => 'guest'], function(){
	Route::get('/', 'LoginController@showLogin');
	Route::post('/', 'LoginController@postLogin');
});

Route::get('/logout', 'LoginController@logout');

// All routes and resources will pass the auth filter in this group.
Route::group(['before' => 'auth'], function(){
	Route::get('/dashboard', [
		'as' => 'dashboard',
		'uses' => 'DashboardController@showDashboard'
	]);

	Route::get('/profile', [
		'as' => 'profile',
		'uses' => 'ProfileController@showProfile'
	]);

	Route::put('/editProfile', [
		'as' => 'editProfile',
		'uses' => 'ProfileController@editProfile'
	]);

	Route::resource('user', 'UserController');
});


// Just for testing. To be removed before production.
Route::get('test', function(){
	dd(Sentry::check());
});