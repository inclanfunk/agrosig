<?php

class Topic extends \Eloquent {
	protected $fillable = [
		'section_id',
		'title',
		'icon',
		'description',
	];

	public function section()
	{
		return $this->belongsTo('Section');
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}
}