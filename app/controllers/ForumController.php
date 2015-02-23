<?php

class ForumController extends \BaseController {

	public function showForum()
	{
		$breadcrumbs = ['Home', 'Forum'];
		return View::make('admin.forum.index')
					->withBreadcrumbs($breadcrumbs);
	}


}
