<?php

class Layer extends \Eloquent {
	protected $fillable = [
		'care_id',
		'layer',
		'mo',
		'nno3',
		'ntot',
		'pbray',
		'polsen',
		'dap',
		'ph',
		'ce',
	];

	public function care()
	{
		return $this->belongsTo('Care');
	}
}