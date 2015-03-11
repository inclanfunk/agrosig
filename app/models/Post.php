<?php

class Post extends \Eloquent {
	protected $fillable = [
		'user_id',
		'topic_id',
		'title',
		'body',
	];

	public function topic()
	{
		return $this->belongsTo('Topic');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function replies()
	{
		return $this->hasMany('Reply');
	}
}