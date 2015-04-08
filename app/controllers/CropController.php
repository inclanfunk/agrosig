<?php

class CropController extends \BaseController {

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
		$crops = Crop::all();
		$breadcrumbs = ['Home', 'Crops'];
		return View::make('admin.crop.index')
					->withCrops($crops)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Crops', 'Create'];
		return View::make('admin.crop.create')
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		Crop::create($data);

		return Redirect::back()->with('success', 'Crop Created Successfully');
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
