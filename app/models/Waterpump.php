<?php

class Waterpump extends \Eloquent {
	protected $fillable = [
		'farm_id',
		'waterpump_reseller_id',
		'lat',
		'long',
		'name',
		'brand',
		'type',
		'power',
		'volume',
		'height',
		'engine_type',
		'amperage',
		'time_shift_boot',
		'imbalance',
		'restart_time',
		'low_voltage',
		'high_voltage',
		'low_charge',
		'amps_phase_r',
		'amps_phase_s',
		'amps_phase_t',
		'line_phase_r',
		'line_phase_s',
		'line_phase_t',
		'power_phase_r',
		'power_phase_s',
		'power_phase_t',
		'electrical_board_type',
		'electrical_board_protection',
		'line_fuse_caliber',
		'contactor_brand',
		'contactor_power',
		'contactor_triange',
		'contactor_triangle_comment',
		'contactor_star',
		'contactors_star_comment',
		'contactor_line',
		'contactor_line_comment',
		'pit_info',
		'deepwell_info',
	];

	public function farm()
	{
		return $this->belongsTo('Farm');
	}
}