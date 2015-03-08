<?php

class Order extends \Eloquent {
	protected $fillable = [
		'farm_id',
		'company_id',
		'pivot_id',
		'waterpump_id',
		'order_number',
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
}