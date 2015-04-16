<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	if(Sentry::check()){
		Sentry::getUser()->update([
			'last_active' => Carbon::now()
		]);
	}
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/*Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::guest('login');
	}
});*/

Route::filter('auth', function()
{
	if (!Sentry::check())
	{
		return Redirect::guest('/');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

/*Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});*/

Route::filter('guest', function()
{
	if (Sentry::check()) return Redirect::to('/dashboard');
});

Route::filter('admin', function()
{
	if(!Sentry::getUser()->hasAccess('system')) return Response::make('<h1>403 Forbidden</h1>', 403);
});

Route::filter('distributor', function()
{
	if(Sentry::getUser()->groups()->first()->name != 'Distributor') return Response::make('<h1>403 Forbidden</h1>', 403);
});

Route::filter('admin-or-distributor', function()
{
	if(Sentry::getUser()->groups()->first()->name != 'Distributor' && !Sentry::getUser()->hasAccess('system')) return Response::make('<h1>403 Forbidden</h1>', 403);
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
