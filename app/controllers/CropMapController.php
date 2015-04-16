<?php

class CropMapController extends \BaseController {

	public function showMap()
	{

		if(Sentry::getUser()->groups()->first()->name == 'Super Administrator'){

			$breadcrumbs = ['Home', 'Maps', 'Crops'];

			return View::make('admin.map.crop')
						->withBreadcrumbs($breadcrumbs);

		}elseif(Sentry::getUser()->groups()->first()->name == 'Manager'){

			$breadcrumbs = ['Home', 'Maps', 'Crops'];
			$crops = Crop::all();

			return View::make('manager.map.crop')
						->withCrops($crops)
						->withBreadcrumbs($breadcrumbs);

		}elseif(Sentry::getUser()->groups()->first()->name == 'Distributor'){

			$breadcrumbs = ['Home', 'Maps', 'Crops'];
			$crops = Crop::all();

			return View::make('distributor.map.crop')
						->withCrops($crops)
						->withBreadcrumbs($breadcrumbs);

		}

	}
}
