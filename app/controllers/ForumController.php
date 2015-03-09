<?php

class ForumController extends \BaseController {

	public function showForum()
	{
		$breadcrumbs = ['Home', 'Forum'];
		$sections = Section::with('topics')->get();
		return View::make('admin.forum.index')
					->withSections($sections)
					->withBreadcrumbs($breadcrumbs);
	}


}
