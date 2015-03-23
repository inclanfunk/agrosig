<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$logged_in_user = Sentry::getUser();
		if($logged_in_user->groups()->first()->name = 'Super Administrator'){
			$orders = Order::all();
			$breadcrumbs = ['Home', 'Parts'];
			return View::make('admin.order.index')
						->withOrders($orders)
						->withBreadcrumbs($breadcrumbs);
		}elseif($logged_in_user->groups()->first()->name = 'Manager'){
			$orders = $logged_in_user->manager->farm->orders;
			$breadcrumbs = ['Home', 'Parts'];
			return View::make('admin.order.index')
						->withOrders($orders)
						->withBreadcrumbs($breadcrumbs);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$farms = Farm::all();
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();
		$breadcrumbs = ['Home', 'Working Order', 'Create'];
		return View::make('admin.order.create')
					->withFarms($farms)
					->withDistributorCompanies($distributor_companies)
					->withBreadcrumbs($breadcrumbs);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$data['total_cost'] = $data['pivot_cost'] + $data['waterpump_cost'];

		Order::create($data);

		return Redirect::back()->with('success', 'Working Order Created Successfully');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
