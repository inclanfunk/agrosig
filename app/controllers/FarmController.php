<?php

class FarmController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('admin', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$farms = Farm::all();
		$breadcrumbs = ['Home', 'Farms'];
		return View::make('admin.farm.index')
					->withFarms($farms)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Farms', 'Create'];
		$companies = Company::where('type', '=', 'Farm')->get();
		return View::make('admin.farm.create')
					->withBreadcrumbs($breadcrumbs)
					->withCompanies($companies);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(
			$data = Input::all(),
			$rules = [
				'name' => 'required|alpha',
				'company_id' => 'required|exists:companies,id',
				'direction' => 'required',
				'zip' => 'required',
				'state' => 'required',
				'country' => 'required',
				'phone' => 'required',
				'fax' => 'required',
				'email' => 'required',
				'geojson' => 'required',
				'logo' => 'required'
			]
		);

		if($validator->fails()){
			return Redirect::route('farms.create')->withErrors($validator->messages());
		}

		$hash_name = sha1(time() . Sentry::getUser());
		Image::make(Input::file('logo'))->resize(100, 100)->save(Config::get('path.logos') . $hash_name . '.jpg');
		$data['logo'] = $hash_name . '.jpg';

		$destination_path = Config::get('path.geojson');
		$file_name =  $hash_name . '.json';
		Input::file('geojson')->move($destination_path, $file_name);
		$data['geojson'] = $hash_name . '.json';

		Farm::create($data);

		return Redirect::route('farms.create');
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


}
