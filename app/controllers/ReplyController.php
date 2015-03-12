<?php

class ReplyController extends \BaseController {

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
			'body' => 'required',
			'post_id' => 'required|exists:posts,id'
		]);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator->messages());
		}

		$data['user_id'] = Sentry::getUser()->id;

		$reply = Reply::create($data);
		// $reply = Reply::with('post')->find($reply->id);

		$pusher = new Pusher(
			Config::get('services.pusher.public'),
			Config::get('services.pusher.private'),
			Config::get('services.pusher.app_id')
		);

		$pusher->trigger('reply', 'new_reply', [$reply]);

		return 'Placeholder';
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
