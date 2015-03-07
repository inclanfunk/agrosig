<?php

class ChatroomController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$chatrooms = Chatroom::all();
		$breadcrumbs = ['Home', 'Chatrooms'];
		return View::make('admin.chatroom.index')
					->withChatrooms($chatrooms)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$breadcrumbs = ['Home', 'Chatroom', 'Create'];
		return View::make('admin.chatroom.create')
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validation later

		$data = Input::all();

		$hash_name = sha1(time() . Sentry::getUser());
		Image::make(Input::file('logo'))->resize(100, 100)->save(Config::get('path.logos') . $hash_name . '.jpg');
		$data['logo'] = $hash_name . '.jpg';

		Chatroom::create($data);

		return Redirect::back()->with('success', 'Chatroom Created Successfully');
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
