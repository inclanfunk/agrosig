<?php

class CompanyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::all();
		$breadcrumbs = ['Home', 'Companies'];
		return View::make('admin.company.index')
					->withCompanies($companies)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Companies', 'Create'];
		return View::make('admin.company.create')->withBreadcrumbs($breadcrumbs);
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
				'type' => 'required',
				'name' => 'required|alpha',
				'ceo_first_name' => 'required|alpha',
				'ceo_last_name' => 'required|alpha',
				'direction' => 'required',
				'zip' => 'required',
				'state' => 'required',
				'country' => 'required',
				'phone' => 'required',
				'fax' => 'required',
				'website' => 'required',
				'email' => 'required',
				'geojson' => 'required',
				'description' => 'required'
			]
		);

		if($validator->fails()){
			return Redirect::route('companies.create')->withErrors($validator->messages());
		}

		Input::file('geojson')->move(public_path() . '/geojson/' , 'geojson.json');

		Company::create($data);

		return Redirect::route('companies.create');
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
