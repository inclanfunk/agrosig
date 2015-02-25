<?php

class EquipmentController extends \BaseController {

	public function listAllEquipment()
	{
		$pivots = Pivot::all();
		$waterpumps = Waterpump::all();

		$breadcrumbs = ['Home', 'Equipment'];
		return View::make('admin.equipment.index')
					->withPivots($pivots)
					->withWaterpumps($waterpumps)
					->withBreadcrumbs($breadcrumbs);
	}

}
