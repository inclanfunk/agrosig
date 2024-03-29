<?php

class Company extends \Eloquent {
	protected $fillable = [
		'type',
		'name',
		'ceo_first_name',
		'ceo_last_name',
		'direction',
		'locality',
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

	public function farms()
	{
		return $this->hasMany('Farm', 'distributor_company_id');
	}

	public function distributor()
	{
		return $this->hasOne('Distributor');
	}
}