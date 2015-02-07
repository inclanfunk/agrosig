<?php

Route::group(['before' => 'guest'], function(){
	Route::get('/', 'LoginController@showLogin');
	Route::post('/', 'LoginController@postLogin');
});

Route::get('/logout', 'LoginController@logout');

Route::get('/dashboard', [
	'before' => 'auth',
	'as' => 'dashboard',
	'uses' => 'DashboardController@showDashboard']
	);


Route::get('test', function(){
	dd(Sentry::check());
});