<?php

class StockController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = Stock::orderBy('fecha', 'DESC')->take(1000)->get();
		$breadcrumbs = ['Home', 'Companies'];

		return View::make('stocks')
					->withStocks($stocks)
					->withBreadcrumbs($breadcrumbs);

	}


}
