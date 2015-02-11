<?php

class Company extends \Eloquent {
	protected $fillable = [
		'type',
		'name',
		'ceo_first_name',
		'ceo_last_name',
		'direction',
		'zip',
		'state',
		'country',
		'phone',
		'fax',
		'website',
		'email',
		'geojson',
		'logo',
		'description'
	];
}