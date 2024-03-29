<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function distributor()
	{
		return $this->hasOne('Distributor');
	}
	
	public function manager()
	{
		return $this->hasOne('Manager');
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function getDates()
	{
		return ['created_at', 'updated_at', 'last_active'];
	}

}
