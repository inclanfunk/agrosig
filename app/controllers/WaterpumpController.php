<?php

class WaterpumpController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$farms = Farm::all();
		$group = Sentry::findGroupByName('Water Pump Reseller');
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();
		$breadcrumbs = ['Home', 'Equipment', 'Waterpump', 'Create'];
		return View::make('admin.equipment.waterpump.create')
					->withFarms($farms)
					->withDistributorCompanies($distributor_companies)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Need to work on validation

		$data = Input::all();

		if(Input::hasFile('deepwell_info')){
			if(Input::file('deepwell_info')->getClientOriginalExtension() == 'jpeg' || Input::file('deepwell_info')->getClientOriginalExtension() == 'jpg'){
				$hash_name = sha1(time() . Sentry::getUser());
				Image::make(Input::file('deepwell_info'))->save(Config::get('path.deepwell') . $hash_name . '.jpg');
				$data['deepwell_info'] = $hash_name . '.jpg';
			}

			if(Input::file('deepwell_info')->getClientOriginalExtension() == 'pdf'){
				$hash_name = sha1(time() . Sentry::getUser());
				$destination_path = Config::get('path.deepwell');
				$file_name =  $hash_name . '.pdf';
				Input::file('deepwell_info')->move($destination_path, $file_name);
				$data['deepwell_info'] = $hash_name . '.pdf';
			}
		}

		Waterpump::create($data);
		return Redirect::back()->with('success', 'Waterpump Created Successfully');
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
