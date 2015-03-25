<?php

class ForumController extends \BaseController {

	public function showForum()
	{
		$breadcrumbs = ['Home', 'Forum'];
		$sections = Section::with('topics.posts.user')->get();
		return View::make('forum.index')
					->withSections($sections)
					->withBreadcrumbs($breadcrumbs);
	}

	public function showTopic($id)
	{
		$topic = Topic::with('posts.replies.user')->find($id);
		$posts = Post::with('user')->where('topic_id', '=', $topic->id)->orderBy('created_at', 'desc')->paginate(10);
		$breadcrumbs = ['Home', 'Forum', 'Topic'];
		return View::make('forum.topic')
					->withTopic($topic)
					->withPosts($posts)
					->withBreadcrumbs($breadcrumbs);
	}

	public function forumUpload()
	{
		if(Input::hasFile('file')){
			$path = Config::get('path.forum_uploads');

			$hash_name = sha1(time() . Sentry::getUser());
			$extension = Input::file('file')->getClientOriginalExtension();
			$name = $hash_name . '.' . $extension;

			Input::file('file')->move($path, $name);

			$url = '/forum_uploads/' . $name;

			return Response::json($url, 200);
		}
	}

}
