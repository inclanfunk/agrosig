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

		if($reply->user_id == $reply->post->user_id){
			return;
		}

		$notification_data = [
			'user_id' => $reply->post->user_id,
			'type' => 'forum',
			'body' => $reply->user->first_name . ' ' . $reply->user->last_name . 
						' replied on your post ' . 
						'<a href="' . '/posts/' . $reply->post->id . '">' . $reply->post->title . '</a>'
		];

		$notification = Notification::create($notification_data);
		$notification->human_time = $notification->created_at->diffForHumans();

		$pusher = new Pusher(
			Config::get('services.pusher.public'),
			Config::get('services.pusher.private'),
			Config::get('services.pusher.app_id')
		);

		$pusher->trigger('notifications', 'forum_notification', $notification);

		return;
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
