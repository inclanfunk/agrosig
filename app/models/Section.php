<?php

class Section extends \Eloquent {
	protected $fillable = [
		'title'
	];

	public function topics()
	{
		return $this->hasMany('Topic');
	}
}