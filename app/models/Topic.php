<?php

class Topic extends \Eloquent {
	protected $fillable = [
		'section_id',
		'name',
		'icon'
	];

	public function section()
	{
		return $this->belongsTo('Section');
	}
}