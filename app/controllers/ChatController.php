<?php

class ChatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::ajax()){
			if(!Input::has('date')){
				$date = Carbon::now();
			}else{
				$date = Input::get('date');
			}

			// All messages were loaded already
			if(Chat::first()->created_at == $date){
				return;
			}

			$chats = Chat::with('user')
				->where('created_at', '<=', $date)
				->orderBy('created_at', 'DESC')
				->take(10)
				->get();

			return Response::json($chats, 200);
		}else{
			$breadcrumbs = ['Home', 'Chat'];
			return View::make('chat')
						->withBreadcrumbs($breadcrumbs);
		}
			
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
		$data = Input::all();
		$data['user_id'] = Sentry::getUser()->id;

		$chat = Chat::create($data);
		$chat = Chat::with('user')->find($chat->id);

		$pusher = new Pusher(
			Config::get('services.pusher.public'),
			Config::get('services.pusher.private'),
			Config::get('services.pusher.app_id')
		);

		$pusher->trigger('chat', 'new_message', [$chat]);

		return Response::json($chat, 200);
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
