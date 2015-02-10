<?php

class DashboardController extends \BaseController {

	public function showDashboard()
	{
		if(Sentry::getUser()->hasAccess('system')){
			$breadcrumbs = ['Home', 'Dashboard'];
			return View::make('admin.dashboard')
						->withBreadcrumbs($breadcrumbs);
		}
	}


}
