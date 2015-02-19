<?php

class EquipmentMapController extends \BaseController {

	public function showMap()
	{
		$breadcrumbs = ['Home', 'Maps', 'Equipment'];

		return View::make('admin.map.equipment')
					->withBreadcrumbs($breadcrumbs);

	}

	public function findFarmsByDistributor($id)
	{
		$group = Sentry::findGroupById('3');
		$farms = Sentry::findUserByGroup($group)->distributor->company->farms;

		dd($farms);
	}

	public function findCompaniesByDistributor()
	{
		$companies = Company::where('type', '=', 'Distributor')->get();
		return Response::json($companies, 200);
	}
}