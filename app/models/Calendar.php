<?php

class Calendar extends \Eloquent {
	protected $fillable = [
		'title',
		'user_id',
		'start',
		'end',
		'icon',
		'description',
		'class',
		'allDay'
	];

	protected $table = 'calendar';
}