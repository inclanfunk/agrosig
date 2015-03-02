<?php

class DashboardController extends \BaseController {

	public function showDashboard()
	{
		if(Sentry::getUser()->groups()->first()->name == 'Super Administrator'){
			$breadcrumbs = ['Home', 'Dashboard'];
			return View::make('admin.dashboard')
						->withBreadcrumbs($breadcrumbs);
		}elseif(Sentry::getUser()->groups()->first()->name == 'Manager'){
			$breadcrumbs = ['Home', 'Dashboard'];
			return View::make('manager.dashboard')
						->withBreadcrumbs($breadcrumbs);
		}elseif(Sentry::getUser()->groups()->first()->name == 'Distributor'){
			$breadcrumbs = ['Home', 'Dashboard'];
			return View::make('distributor.dashboard')
						->withBreadcrumbs($breadcrumbs);
		}
	}


}
