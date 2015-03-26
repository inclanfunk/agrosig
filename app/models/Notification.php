<?php

class Notification extends \Eloquent {
	protected $fillable = [
		'user_id',
		'body',
		'read'
	];
}