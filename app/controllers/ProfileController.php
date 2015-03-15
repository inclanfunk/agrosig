<?php

class ProfileController extends \BaseController {

	public function showProfile()
	{
		$breadcrumbs = ['Home', 'Profile'];
		return View::make('profile')->withBreadcrumbs($breadcrumbs);
	}

	public function editProfile()
	{
		$validator = Validator::make($data = Input::all(), [
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email',
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
		
		if(Input::hasFile('photo')){
			$hashName = sha1(time() . Sentry::getUser());
			Image::make(Input::file('photo'))->resize(100, 100)->save(Config::get('path.photos') . $hashName . '.jpg');
			$data['photo'] = $hashName . '.jpg';
			File::delete(Config::get('path.photos') . $user->photo);
		}else{
			unset($data['photo']);
		}

		
		$user->update($data);

		return Redirect::to('profile');
	}


}
