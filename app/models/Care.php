<?php

class Care extends \Eloquent {
	protected $fillable = [
		'crop_section_id',
		'achieve_density',
		'distance_between_lines',
		'irrigation',
		'irrigation_quantity',
		'nitrogen',
		'phosphorus',
		'sulphur',
		'other',
		'date_of_harvest',
		'humidity',
		'yield',
	];

	public function layers()
	{
		return $this->hasMany('Layer');
	}
}