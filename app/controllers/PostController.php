<?php

class PostController extends \BaseController {

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
		$breadcrumbs = ['Home', 'Forum', 'Topic', 'Post', 'Create'];
		$user = Sentry::getUser();
		$topic = Topic::find(Input::get('topic_id'));
		return View::make('post.create')
					->withTopic($topic)
					->withUser($user)
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
			'title' => 'required',
			'body' => 'required',
			'topic_id' => 'required|exists:topics,id'
		]);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator->messages());
		}

		$data['user_id'] = Sentry::getUser()->id;

		$post = Post::create($data);

		return Response::json($post, 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$breadcrumbs = ['Home', 'Forum', 'Topic', 'Post'];
		$user = Sentry::getUser();
		$post = Post::with('topic.section', 'user')->find($id);
		$replies = Reply::with('user')->where('post_id', '=', $post->id)->paginate(10);
		return View::make('post.show')
					->withPost($post)
					->withReplies($replies)
					->withUser($user)
					->withBreadcrumbs($breadcrumbs);
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
