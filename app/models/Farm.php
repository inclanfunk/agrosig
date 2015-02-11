<?php

class Farm extends \Eloquent {
	protected $fillable = [
		'name',
		'company_id',
		'direction',
		'zip',
		'state',
		'country',
		'phone',
		'fax',
		'email',
		'geojson',
		'logo',
	];

	public function company()
	{
		return $this->belongsTo('Company');
	}
}