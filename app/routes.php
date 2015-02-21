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

	Route::resource('users', 'UserController');
	Route::resource('companies', 'CompanyController');
	Route::resource('farms', 'FarmController');
	Route::resource('equipment', 'EquipmentController'); // No use right now!
	Route::resource('pivots', 'PivotController');
	Route::resource('waterpumps', 'WaterpumpController');

	Route::get('/equipment-map', [
		'as' => 'equipmentMap',
		'uses' => 'EquipmentMapController@showMap'
	]);

	Route::get('/distributor-companies', 'EquipmentMapController@findCompaniesByDistributor');
	Route::get('/distributor/{id}/farms', 'EquipmentMapController@findFarmsByDistributorCompanies');

});

// Just for testing. To be removed before production.
Route::get('test', function(){
	// dd(Carbon::createFromFormat('Y-m-d H:i:s', Sentry::getUser()->last_active)->diffForHumans());
	// dd(Config::get('path.logo'));
	// $faker = Faker::create();
	// $farm_companies = Company::where('type', '=', 'Farm')->get();
	// return $farm_companies->shuffle()->first();
	// return $farms = Farm::all()->shuffle()->first();
	// if(Sentry::getUser()->hasAccess('system')) return 5;
	// $group = Sentry::findGroupByName('Distributor');
	// $users = Sentry::findAllUsersInGroup($group);
	// dd($users);
	// dd(Farm::find(1)->distributor_company);
});