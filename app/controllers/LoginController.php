<?php

class LoginController extends \BaseController {

	// Show the login form
	public function showLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{

		$validator = Validator::make(Input::all(), [
				'email' => 'required',
				'password' => 'required',
				'g-recaptcha-response' => 'required|recaptcha'
			]);

		if($validator->fails()){
			return Redirect::to('/')->with('message', $validator->messages()->first());
		}

		$credentials = [
			'email' => Input::get('email'),
			'password' => Input::get('password')
		];

		try
		{
			$user = Sentry::authenticate($credentials, Input::get('remember'));
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Redirect::to('/')->with('message', 'Email/Password combination incorrect.');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::to('/')->with('message', 'Email/Password combination incorrect.');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return Redirect::to('/')->with('message', 'User is not activated.');
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return Redirect::to('/')->with('message', 'User is suspended.');
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return Redirect::to('/')->with('message', 'User is banned.');
		}

		Sentry::login($user, Input::get('remember'));
		return Redirect::to('dashboard');

	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('/');
	}


}
