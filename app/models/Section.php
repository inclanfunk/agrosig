<?php

class Section extends \Eloquent {
	protected $fillable = [
		'name'
	];

	public function topics()
	{
		return $this->hasMany('Topic');
	}
}