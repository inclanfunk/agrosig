<?php

class Distributor extends \Eloquent {
	protected $fillable = [
		'user_id',
		'company_id',
		'farm_id'
	];

	public function farms()
	{
		return $this->hasMany('farms');
	}
}