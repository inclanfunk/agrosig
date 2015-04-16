<?php

class TopicController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('admin-or-distributor');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = Topic::all();
		$breadcrumbs = ['Home', 'Manage Forum', 'Topics'];
		return View::make('admin.forum.topic.index')
					->withTopics($topics)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Manage Forum', 'Topic', 'Create'];
		$sections = Section::all();
		return View::make('admin.forum.topic.create')
					->withSections($sections)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), [
			'section_id' 	=> 'required|exists:sections,id',
			'title' 		=> 'required',
			'icon' 			=> 'required',
			'description' 	=> 'required'
		]);

		if($validator->fails()){
			return Redirect::route('topics.create')->withErrors($validator->messages());
		}

		Topic::create($data);

		return Redirect::back()->with('success', 'Topic Created Successfully');
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
