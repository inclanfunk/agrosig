<?php

class EquipmentMapController extends \BaseController {

	public function showMap()
	{
		$breadcrumbs = ['Home', 'Maps', 'Equipment'];

		return View::make('admin.map.equipment')
					->withBreadcrumbs($breadcrumbs);

	}

	public function findFarmsByDistributorCompanies($id)
	{
		$farms = Company::find($id)->farms;
		return Response::json($farms, 200);
	}

	public function findCompaniesByDistributor()
	{
		$companies = Company::where('type', '=', 'Distributor')->get();
		return Response::json($companies, 200);
	}
}