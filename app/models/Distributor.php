<?php

class Distributor extends \Eloquent {
	protected $fillable = [
		'user_id',
		'company_id'
	];

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}