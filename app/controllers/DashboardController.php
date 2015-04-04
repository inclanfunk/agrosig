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
			$posts = Post::orderBy('created_at', 'DESC')->take(10)->get();
			$orders = Order::where('farm_id', '=', Sentry::getUser()->manager->farm->id)->orderBy('date', 'ASC')->get();
			$pivots = Sentry::getUser()->manager->farm->pivots;
			foreach($pivots as $pivot){
				$pivot->monthly_cost = Order::where('pivot_id', '=', $pivot->id)->where('date', '>', Carbon::now()->firstOfMonth())->sum('pivot_cost');
				$pivot->yearly_cost = Order::where('pivot_id', '=', $pivot->id)->where('date', '>', Carbon::now()->firstOfYear())->sum('pivot_cost');
			}
			$waterpumps = Sentry::getUser()->manager->farm->waterpumps;
			foreach($waterpumps as $waterpump){
				$waterpump->monthly_cost = Order::where('waterpump_id', '=', $waterpump->id)->where('date', '>', Carbon::now()->firstOfMonth())->sum('waterpump_cost');
				$waterpump->yearly_cost = Order::where('waterpump_id', '=', $waterpump->id)->where('date', '>', Carbon::now()->firstOfYear())->sum('waterpump_cost');
			}
			return View::make('manager.dashboard')
						->withBreadcrumbs($breadcrumbs)
						->withUsers($users)
						->withPosts($posts)
						->withOrders($orders)
						->withPivots($pivots)
						->withWaterpumps($waterpumps);

		}elseif(Sentry::getUser()->groups()->first()->name == 'Distributor'){

			$breadcrumbs = ['Home', 'Dashboard'];
			$users = User::orderBy('last_active', 'DESC')->get();
			return View::make('distributor.dashboard')
						->withBreadcrumbs($breadcrumbs)
						->withUsers($users);

		}
	}


}
