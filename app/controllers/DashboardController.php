<?php

class DashboardController extends \BaseController {

	public function showDashboard()
	{
		if(Sentry::getUser()->groups()->first()->name == 'Super Administrator'){
			$breadcrumbs = ['Home', 'Dashboard'];
			$users = User::orderBy('last_active', 'DESC')->get();
			return View::make('admin.dashboard')
						->withBreadcrumbs($breadcrumbs)
						->withUsers($users);
		}elseif(Sentry::getUser()->groups()->first()->name == 'Manager'){
			$breadcrumbs = ['Home', 'Dashboard'];
			$users = User::orderBy('last_active', 'DESC')->get();
			return View::make('manager.dashboard')
						->withBreadcrumbs($breadcrumbs)
						->withUsers($users);
		}elseif(Sentry::getUser()->groups()->first()->name == 'Distributor'){
			$breadcrumbs = ['Home', 'Dashboard'];
			$users = User::orderBy('last_active', 'DESC')->get();
			return View::make('distributor.dashboard')
						->withBreadcrumbs($breadcrumbs)
						->withUsers($users);
		}
	}


}
