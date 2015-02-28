<?php

class CalendarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /calendar
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::ajax()){
			$calendar = Calendar::where('start', '>=', Carbon::createFromTimestamp(Input::get('start')))
						->where('end', '<=', Carbon::createFromTimestamp(Input::get('end')))
						->get();

			foreach($calendar as $cal){
				$cal->className = $cal->class;
			}
			return Response::json($calendar, 200);
		}

		$breadcrumbs = ['Home', 'Calendar'];
		return View::make('admin.calendar.index')
					->withBreadcrumbs($breadcrumbs);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /calendar/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /calendar
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$data['class'] = $data['className'];
		$data['start'] = Carbon::createFromTimeStamp($data['start'])->toDateTimeString();

		if(Input::has('end')){
			$data['end'] = Carbon::createFromTimeStamp($data['end'])->toDateTimeString();
		}else{
			$data['end'] = $data['start'];
		}

		$data['user_id'] = Sentry::getUser()->id;

		// dd($data['user_id']);

		$calendar = Calendar::create($data);

		return Response::json([
				'status' => 'success',
				'data' => $calendar
			], 200);
		
	}

	/**
	 * Display the specified resource.
	 * GET /calendar/{id}
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
	 * GET /calendar/{id}/edit
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
	 * PUT /calendar/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();

		if($data['user_id'] == Sentry::getUser()->id){
			$data['start'] = Carbon::createFromTimeStamp($data['start'])->toDateTimeString();

			if(Input::has('end')){
				$data['end'] = Carbon::createFromTimeStamp($data['end'])->toDateTimeString();
			}else{
				$data['end'] = $data['start'];
			}
		}

		$calendar = Calendar::find($data['id'])->update($data);

		return Response::json([
				'status' => 'success',
				'data' => $calendar
			], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /calendar/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}