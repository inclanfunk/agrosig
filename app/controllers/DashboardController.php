<?php

class DashboardController extends \BaseController {

	public function showDashboard()
	{
		if(Sentry::getUser()->hasAccess('system')){
			return View::make('admin.dashboard');
		}
	}


}
