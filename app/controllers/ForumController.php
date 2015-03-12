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
		$topic = Topic::with('posts.replies.user')->find($id);
		$posts = Post::with('user')->where('topic_id', '=', $topic->id)->paginate(10);
		$breadcrumbs = ['Home', 'Forum', 'Topic'];
		return View::make('admin.forum.topic')
					->withTopic($topic)
					->withPosts($posts)
					->withBreadcrumbs($breadcrumbs);
	}

}
