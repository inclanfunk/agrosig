<?php

class Topic extends \Eloquent {
	protected $fillable = [
		'section_id',
		'name'
	];

	public function section()
	{
		return $this->belongsTo('Section');
	}
}