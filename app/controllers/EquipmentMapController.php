<?php

class EquipmentMapController extends \BaseController {

	public function showMap()
	{
		$breadcrumbs = ['Home', 'Maps', 'Equipment'];

		return View::make('admin.map.equipment')
					->withBreadcrumbs($breadcrumbs);

	}

	public function findCompaniesByDistributor()
	{
		$companies = Company::where('type', '=', 'Distributor')->get();
		return Response::json($companies, 200);
	}

	public function findFarmsByDistributorCompanies($id)
	{
		$farms = Company::find($id)->farms;
		return Response::json($farms, 200);
	}

	public function findPivotsByFarms($id)
	{
		$pivots = Farm::find($id)->pivots;
		return Response::json($pivots, 200);
	}

	public function findWaterpumpsByFarms($id)
	{
		$waterpumps = Farm::find($id)->waterpumps;
		return Response::json($waterpumps, 200);
	}
}