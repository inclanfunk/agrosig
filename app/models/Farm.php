<?php

class Farm extends \Eloquent {
	protected $fillable = [
		'name',
		'farm_company_id',
		'distributor_company_id',
		'direction',
		'locality',
		'zip',
		'state',
		'country',
		'phone',
		'fax',
		'email',
		'geojson',
		'logo',
	];

	public function farmCompany()
	{
		return $this->belongsTo('Company', 'farm_company_id');
	}

	public function distributorCompany()
	{
		return $this->belongsTo('Company', 'distributor_company_id');
	}

	public function pivots()
	{
		return $this->hasMany('Pivot');
	}

	public function waterpumps()
	{
		return $this->hasMany('Waterpump');
	}

	public function orders()
	{
		return $this->hasMany('Order');
	}
}