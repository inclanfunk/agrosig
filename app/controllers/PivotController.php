<?php

class PivotController extends \BaseController {

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
		$group = Sentry::findGroupByName('Distributor');
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();
		$breadcrumbs = ['Home', 'Equipment', 'Pivots', 'Create'];
		return View::make('admin.equipment.pivot.create')
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

		$validator = Validator::make($data = Input::all(), [
			'name' => 'required|unique:pivots'
		]);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator->messages());
		}
		
		// Calculating area for the pivot manually and converting it into hectares
		$data['area'] = 3.1416 * $data['radius'] * $data['radius'] / 10000;

		Pivot::create($data);
		return Redirect::back()->with('success', 'Pivot Created Successfully');
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
