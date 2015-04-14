<?php

if(Sentry::check()){
	App::setLocale(Sentry::getUser()->locale);
}

// Logged in users cannot access these routes. Only guests.
Route::group(['before' => 'guest'], function(){
	Route::get('/', 'LoginController@showLogin');
	Route::post('/', 'LoginController@postLogin');

	Route::controller('password', 'RemindersController');
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

	Route::get('changeLocale', 'ProfileController@changeLocale');
	Route::post('changePhoto', 'ProfileController@changePhoto');
	Route::get('myProfile', 'ProfileController@myProfile');

	Route::resource('users', 'UserController');
	Route::resource('companies', 'CompanyController');
	Route::resource('farms', 'FarmController');
	// Route::resource('equipment', 'EquipmentController'); // No use right now!

	Route::get('equipment', 'EquipmentController@listAllEquipment');

	Route::resource('pivots', 'PivotController');
	Route::resource('waterpumps', 'WaterpumpController');
	Route::resource('parts', 'PartController');

	Route::resource('orders', 'OrderController');

	Route::get('/equipment-map', [
		'as' => 'equipmentMap',
		'uses' => 'EquipmentMapController@showMap'
	]);

	Route::get('/crop-map', [
		'as' => 'cropMap',
		'uses' => 'CropMapController@showMap'
	]);

	Route::get('/distributor-companies', 'EquipmentMapController@findCompaniesByDistributor');

	Route::get('/distributor/{id}/farms', 'EquipmentMapController@findFarmsByDistributorCompanies');
	Route::get('/farm/{id}/pivots', 'EquipmentMapController@findPivotsByFarms');
	Route::get('/farm/{id}/waterpumps', 'EquipmentMapController@findWaterpumpsByFarms');

	Route::resource('calendar', 'CalendarController');
	Route::resource('chat', 'ChatController');
	Route::resource('chatrooms', 'ChatroomController');

	Route::get('/forum', 'ForumController@showForum');
	Route::get('/forum/topics/{id}', 'ForumController@showTopic');
	Route::post('/forum/upload', 'ForumController@forumUpload');

	Route::resource('sections', 'SectionController');
	Route::resource('topics', 'TopicController');
	Route::resource('posts', 'PostController');
	Route::resource('replies', 'ReplyController');

	Route::resource('notifications', 'NotificationController');

	Route::get('/forum/notifications', 'NotificationController@forumNotifications');

	Route::resource('crops', 'CropController');

	Route::resource('crop-sections', 'CropSectionController');

	Route::resource('cares', 'CareController');

	Route::resource('stocks', 'StockController');

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
	// dd(Sentry::getUser()->id);
	// $calendar = Calendar::where('start', '>=', Carbon::createFromTimestamp(Input::get('start')))->get();
	// dd($calendar);
	// $data = Sentry::getUser()->groups->first()->name;
	// dd($data);
	// $pusher = new Pusher('082bab423e2a8be3da2a', '23f89ae57ba5ff17c82d', '109193');
	// $pusher->trigger('chat', 'new_message', []);
	// return 'Done';
	// return User::first()->groups()->first();
	// return Config::get('app.locale');

	// $stocks = simplexml_load_file('http://www.matba.com.ar/xml/ajustes.xml');
		
	// foreach($stocks->children() as $stock){
	// 	$stock_item = [];

	// 	foreach($stock as $stock_key => $stock_value){

	// 		if($stock_key == 'fecha'){
	// 			$date = explode('/', $stock_value);
	// 			// dd($date);
	// 			$date_required_format = $date[2] . '-' . $date[1] . '-' . $date[0];
	// 			$stock_item[$stock_key] = $date_required_format;
	// 		}else{
	// 			$stock_item[$stock_key] = $stock_value;
	// 		}
			
	// 	}

	// 	Stock::create($stock_item);
	// }

	// return App::environment();

	// return Config::get('database.connections.mysql.username');


	// $pivots = Sentry::getUser()->manager->farm->pivots;

	// foreach($pivots as $pivot){
	// 	$pivot->monthly_cost = Order::where('pivot_id', '=', $pivot->id)->where('date', '>', Carbon::now()->firstOfMonth())->sum('pivot_cost');
	// 	$pivot->yearly_cost = Order::where('pivot_id', '=', $pivot->id)->where('date', '>', Carbon::now()->firstOfYear())->sum('pivot_cost');
	// }

	// return $pivots;


});