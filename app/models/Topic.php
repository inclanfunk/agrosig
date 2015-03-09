<?php

class Topic extends \Eloquent {
	protected $fillable = [
		'section_id',
		'name',
		'icon',
		'description',
	];

	public function section()
	{
		return $this->belongsTo('Section');
	}
}