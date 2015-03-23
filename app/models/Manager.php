<?php

class Manager extends \Eloquent {
	protected $fillable = [
		'user_id',
		'company_id',
		'farm_id'
	];

	public function farm()
	{
		return $this->belongsTo('Farm');
	}
}