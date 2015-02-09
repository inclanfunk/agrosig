<?php

class ProfileController extends \BaseController {

	public function showProfile()
	{
		if(Sentry::getUser()->hasAccess('system')){
			return View::make('admin.profile');
		}
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
			Image::make(Input::file('photo'))->resize(100, 100)->save(public_path() . '/photos/' . $hashName . '.jpg');
			$data['photo'] = $hashName . '.jpg';
			File::delete(public_path() . '/photos/' . $user->photo);
		}else{
			unset($data['photo']);
		}

		
		$user->update($data);

		return Redirect::to('profile');
	}


}
