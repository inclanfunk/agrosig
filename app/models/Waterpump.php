<?php

class Waterpump extends \Eloquent {
	protected $fillable = [
		'farm_id',
		'company_id',
		'lat',
		'long',
		'name',
		'g_brand',
		'g_type',
		'g_power',
		'g_volume',
		'g_hieght',
		'g_engine_type',
		'g_voltage',
		'g_amperage',
		's_time_shift_boot',
		's_imbalance',
		's_restart_time',
		's_low_voltage',
		's_high_voltage',
		's_low_charge',
		's_amps_phase_r',
		's_amps_phase_s',
		's_amps_phase_t',
		's_line_phase_r',
		's_line_phase_s',
		's_line_phase_t',
		's_power_phase_r',
		's_power_phase_s',
		's_power_phase_t',
		'eb_type',
		'eb_protection',
		'eb_line_fuse_caliber',
		'eb_contactor_brand',
		'eb_contactor_power',
		'eb_contactor_triange',
		'eb_contactor_triangle_comment',
		'eb_contactor_star',
		'contactors_star_comment',
		'eb_contactor_line',
		'eb_contactor_line_comment',
		'pit_info',
		'deepwell_info',
	];

	public function farm()
	{
		return $this->belongsTo('Farm');
	}
}