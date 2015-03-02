<?php

class Chat extends \Eloquent {
	protected $fillable = [
		'user_id',
		'body',
	];

	protected $table = 'chat';

	public function user()
	{
		return $this->belongsTo('User');
	}
}