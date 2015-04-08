<?php

class UserController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Sentry::findAllUsers();
		$breadcrumbs = ['Home', 'Users'];
		return View::make('admin.user.index')
					->withUsers($users)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Users', 'Create'];
		$farm_companies = Company::where('type', '=', 'Farm')->get();
		$distrubutor_companies = Company::where('type', '=', 'Distributor')->get();
		$water_pump_companies = Company::where('type', '=', 'Water Pump')->get();
		$farms = Farm::all();
		$group = Sentry::findGroupByName('distributor');
		$distributors = Sentry::findAllUsersInGroup($group);
		return View::make('admin.user.create')
					->withBreadcrumbs($breadcrumbs)
					->withFarmCompanies($farm_companies)
					->withDistributorCompanies($distrubutor_companies)
					->withWaterPumpCompanies($water_pump_companies)
					->withFarms($farms)
					->withDistributors($distributors);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// First round of validations
		$validator = Validator::make(
			$data = Input::all(),
			$rules = [
				'first_name' 			=> 'required|alpha',
				'last_name' 			=> 'required|alpha',
				'email'					=> 'required|unique:users',
				'password'				=> 'required|confirmed',
				'password_confirmation'	=> 'required',
				'phone' 				=> 'required',
				'photo' 				=> 'required',
				'type' 					=> 'required',
			]
		);

		// dd($validator->messages());

		if($validator->fails()){
			return Redirect::back()->withErrors($validator->messages());
		}

		// Second round of validations
		switch ($data['type']) {
			case 1:

				$validator = Validator::make(
					$data = Input::all(),
					$rules = [
						'company_id' 	=> 'required',
						'farm_id' 		=> 'required',
					]
				);

				// dd($validator->messages());

				if($validator->fails()){
					return Redirect::back()->withErrors($validator->messages());
				}

				$hashName = sha1(time() . Sentry::getUser());
				Image::make(Input::file('photo'))->resize(100, 100)->save(Config::get('path.photos') . $hashName . '.jpg');
				$data['photo'] = $hashName . '.jpg';

				// Create the user
				$user = Sentry::createUser(array(
					'email'     => $data['email'],
					'password'  => $data['password'],
					'first_name'  => $data['first_name'],
					'last_name'  => $data['last_name'],
					'phone'  => $data['phone'],
					'facebook'  => $data['facebook'],
					'twitter'  => $data['twitter'],
					'photo'  => $data['photo'],
					'activated' => true,
				));

				// Find the group using the group id
				$adminGroup = Sentry::findGroupById(2);

				// Assign the group to the user
				$user->addGroup($adminGroup);

				Manager::create([
					'user_id' => $user->id,
					'company_id' => $data['company_id'],
					'farm_id' => $data['farm_id']
				]);

				return Redirect::back()->with('success', 'Manager Created Successfully');

				break;

			case 2:

				$validator = Validator::make(
					$data = Input::all(),
					$rules = [
						'company_id' 	=> 'required',
					]
				);

				if($validator->fails()){
					return Redirect::back()->withErrors($validator->messages());
				}

				$hashName = sha1(time() . Sentry::getUser());
				Image::make(Input::file('photo'))->resize(100, 100)->save(Config::get('path.photos') . $hashName . '.jpg');
				$data['photo'] = $hashName . '.jpg';

				// Create the user
				$user = Sentry::createUser(array(
					'email'     => $data['email'],
					'password'  => $data['password'],
					'first_name'  => $data['first_name'],
					'last_name'  => $data['last_name'],
					'phone'  => $data['phone'],
					'facebook'  => $data['facebook'],
					'twitter'  => $data['twitter'],
					'photo'  => $data['photo'],
					'activated' => true,
				));

				// Find the group using the group id
				$adminGroup = Sentry::findGroupById(3);

				// Assign the group to the user
				$user->addGroup($adminGroup);

				Distributor::create([
					'user_id' => $user->id,
					'company_id' => $data['company_id']
				]);

				return Redirect::back()->with('success', 'Distributor Created Successfully');

				break;

			case 3:

				$validator = Validator::make(
					$data = Input::all(),
					$rules = [
						'company_id' 	=> 'required',
					]
				);

				if($validator->fails()){
					return Redirect::back()->withErrors($validator->messages());
				}

				$hashName = sha1(time() . Sentry::getUser());
				Image::make(Input::file('photo'))->resize(100, 100)->save(Config::get('path.photos') . $hashName . '.jpg');
				$data['photo'] = $hashName . '.jpg';

				// Create the user
				$user = Sentry::createUser(array(
					'email'     => $data['email'],
					'password'  => $data['password'],
					'first_name'  => $data['first_name'],
					'last_name'  => $data['last_name'],
					'phone'  => $data['phone'],
					'facebook'  => $data['facebook'],
					'twitter'  => $data['twitter'],
					'photo'  => $data['photo'],
					'activated' => true,
				));

				// Find the group using the group id
				$adminGroup = Sentry::findGroupById(4);

				// Assign the group to the user
				$user->addGroup($adminGroup);

				WaterPumpReseller::create([
					'user_id' => $user->id,
					'company_id' => $data['company_id']
				]);

				return Redirect::back()->with('success', 'Water Pump Reseller Created Successfully');

				break;
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function findUsersForChat()
	{
		$users = Sentry::findAllUsers();
		$breadcrumbs = ['Home', 'Chat'];
		return View::make('chat')
					->withUsers($users)
					->withBreadcrumbs($breadcrumbs);
	}


}
