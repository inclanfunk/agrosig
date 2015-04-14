<?php

class CareController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), [
			'crop_section_id' 			=> 'required|exists:crop_sections,id',
			'achieve_density' 			=> 'required|numeric',
			'distance_between_lines' 	=> 'required|numeric',
			'irrigation' 				=> 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
			'nitrogen' 					=> 'required|numeric',
			'phosphorus' 				=> 'required|numeric',
			'pottasium' 				=> 'required|numeric',
			'sulphur' 					=> 'required|numeric',
			'other' 					=> 'required|numeric',
			'date_of_harvest' 			=> 'required|date:yy-mm-dd',
			'humidity' 					=> 'required|numeric',
			'yield' 					=> 'required|numeric',
		]);

		if($validator->fails()){
			return Response::json($validator->messages(), 400);
		}

		$user = Sentry::getUser();

		if($user->groups->first()->name != 'Manager' ||
			$user->id != CropSection::find($data['crop_section_id'])->pivot->farm->manager->user_id){
			return Response::json('Forbidden', 403);
		}

		$care = Care::create($data);

		foreach($data['layers'] as $layer){
			$layer_data = ['layer' => $layer];

			foreach($data as $key => $value){
				$exploded = explode('_', $key);
				if($exploded[0] == $layer){
					$layer_data['' . $exploded[1] . ''] = $value;
					// dd($value);
				}
			}

			// dd($layer_data);

			$new_layer = new Layer($layer_data);
			$care->layers()->save($new_layer);
		}

		return Response::json($care, 201);

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
