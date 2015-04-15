<?php

class DistributorClientController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('distributor');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$farms = Sentry::getUser()->distributor->company->farms->load('manager');
		$breadcrumbs = ['Home', 'Clients'];
		return View::make('distributor.clients')
					->withFarms($farms)
					->withBreadcrumbs($breadcrumbs);
	}

}
