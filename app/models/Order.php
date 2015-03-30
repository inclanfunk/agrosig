<?php

class Order extends \Eloquent {
	protected $fillable = [
		'farm_id',
		'company_id',
		'pivot_id',
		'waterpump_id',
		'order_number',
		'date',
		'pivot_task',
		'pivot_category',
		'gear_train',
		'electricity',
		'sprinkling',
		'pivot_cost',
		'waterpump_task',
		'waterpump_category',
		'motor',
		'electrical_board',
		'waterpump',
		'waterpump_cost',
		'total_cost'
	];

	public function farm()
	{
		return $this->belongsTo('Farm');
	}

	public function getDates()
	{
		return ['created_at', 'updated_at', 'date'];
	}
}