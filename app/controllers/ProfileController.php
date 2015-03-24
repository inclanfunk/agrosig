<?php

class ProfileController extends \BaseController {

	public function showProfile()
	{
		$breadcrumbs = ['Home', 'Profile'];
		return View::make('profile')->withBreadcrumbs($breadcrumbs);
	}

	public function editProfile()
	{
		$current_user = Sentry::getUser()->id;

		$validator = Validator::make($data = Input::all(), [
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email|unique:users,email,' . $current_user,
			'phone' => 'required'
		]);

		if($validator->fails()){
			return Redirect::to('profile')->withErrors($validator->messages());
		}

		if(is_null($data['password']) || empty($data['password'])){
			unset($data['password']);
			unset($data['password_confirm']);
		}elseif($data['password'] != $data['password_confirm']){
			return Redirect::to('profile');
		}else{
			unset($data['password_confirm']);
		}

		$user = Sentry::getUser();
		
		$user->update($data);

		return Redirect::to('profile');
	}

	public function changeLocale()
	{
		$validator = Validator::make(Input::all(), [
			'locale' => 'required|in:en,fr,es,de,jp,cn,it,pt,ru,kr'
		]);

		if($validator->fails()){
			return Redirect::back();
		}

		Sentry::getUser()->update(['locale' => Input::get('locale')]);

		return Redirect::back();
	}

	public function changePhoto()
	{
		$user = Sentry::getUser();

		$hashName = sha1(time() . Sentry::getUser());
		Image::make(Input::file('file'))->resize(100, 100)->save(Config::get('path.photos') . $hashName . '.jpg');
		$data['photo'] = $hashName . '.jpg';
		File::delete(Config::get('path.photos') . $user->photo);

		$user->update($data);

		return Response::json([], 200);
	}

	public function myProfile()
	{
		$user = Sentry::getUser();

		return Response::json($user, 200);
	}


}
