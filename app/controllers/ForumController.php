<?php

class ForumController extends \BaseController {

	public function showForum()
	{
		$breadcrumbs = ['Home', 'Forum'];
		$sections = Section::with('topics.posts.user')->get();
		return View::make('admin.forum.index')
					->withSections($sections)
					->withBreadcrumbs($breadcrumbs);
	}

	public function showTopic($id)
	{
		$topic = Topic::with('posts.user', 'posts.replies.user')->find($id);
		$breadcrumbs = ['Home', 'Forum', 'Topic'];
		return View::make('admin.forum.topic')
					->withTopic($topic)
					->withBreadcrumbs($breadcrumbs);
	}

}
