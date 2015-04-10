<?php

class CropSectionController extends \BaseController {

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
			'crop_id' 			=> 'required|exists:crops,id',
			'pivot_id' 			=> 'required|exists:pivots,id',
			'predecessor' 		=> 'required|exists:crops,id',
			'start_angle'		=> 'required|numeric|between:0,359',
			'stop_angle'		=> 'required|numeric|between:0,359',
			'variety_or_hybrid'	=> 'required',
			'years'				=> 'required|in:1,2,3,4,5,6,7,8,9,10,10+',
			'seeding_system'	=> 'required|in:1,2',
			'density'			=> 'required|numeric',
			'density_type'		=> 'required|in:1,2',
			'date_of_seeding'	=> 'required|date:yy-mm-dd',
		]);

		if($validator->fails()){
			return Response::json($validator->messages(), 400);
		}

		$user = Sentry::getUser();

		if($user->groups->first()->name != 'Manager' ||
			$user->id != Pivot::find($data['pivot_id'])->farm->manager->user_id){
			return Response::json('Forbidden', 403);
		}

		$crop_sections = CropSection::where('pivot_id', '=', $data['pivot_id'])->get();

		/*if($data['start_angle'] > $data['stop_angle']){
			return Response::json(['stop_angle' => 'Stop Angle should be greater than Start Angle'], 400);
		}*/

		foreach($crop_sections as $crop_section){
			if($data['start_angle'] > $crop_section->start_angle && $data['start_angle'] < $crop_section->stop_angle){
				return Response::json(['angles' => 'Angles are intersecting with existing Crop Sections'], 400);
			}

			if($data['stop_angle'] > $crop_section->start_angle && $data['stop_angle'] < $crop_section->stop_angle){
				return Response::json(['angles' => 'Angles are intersecting with existing Crop Sections'], 400);
			}

			if($data['start_angle'] == $crop_section->start_angle && $data['stop_angle'] == $crop_section->stop_angle){
				return Response::json(['angles' => 'Angles are intersecting with existing Crop Sections'], 400);
			}

			if($data['start_angle'] == $crop_section->stop_angle){
				$data['start_angle']++; 
			}

			if($data['stop_angle'] == $crop_section->start_angle){
				$data['start_angle']--; 
			}
		}

		$crop_section = CropSection::create($data);

		$crop_section->load('pivot', 'crop');

		return Response::json($crop_section, 201);
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
