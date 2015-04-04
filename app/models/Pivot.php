<?php

class Pivot extends \Eloquent {
	protected $fillable = [
		'farm_id',
		'company_id',
		'lat',
		'long',
		'name',
		'radius',
		'g_brand',
		'g_model',
		'g_quantity_of_arms_10_quantity',
		'g_quantity_of_arms_10_length',
		'g_quantity_of_arms_10_number_of_drops',
		'g_quantity_of_arms_10_distance_between_drops',
		'g_quantity_of_arms_8_5by8_quantity',
		'g_quantity_of_arms_8_5by8_length',
		'g_quantity_of_arms_8_5by8_number_of_drops',
		'g_quantity_of_arms_8_5by8_distance_between_drops',
		'g_quantity_of_arms_6_5by8_quantity',
		'g_quantity_of_arms_6_5by8_length',
		'g_quantity_of_arms_6_5by8_number_of_drops',
		'g_quantity_of_arms_6_5by8_distance_between_drops',
		'g_sprinkler_model',
		'g_sprikler_type',
		'g_sprinkler_counterweight',
		'g_regulator_brand',
		'g_regulator_type',
		'g_regulator_range',
		'g_wheel_size',
		'g_overhang_length',
		'g_overhang_diameter',
		'g_overhang_distance_between_drops',
		'g_alignment',
		'g_rolling_train_brand',
		'g_rolling_train_type',
		'g_rolling_train_rpm',
		'g_rolling_train_relationship',
		'g_masa_brand',
		'g_masa_type',
		'g_masa_relation',
		'g_spreader_type',
		's_rotation_time',
		's_sheet',
		's_minimum_working_pressure',
		's_input_voltage',
		's_shut_down_low_voltage',
		's_minimum_voltage',
		's_working_pressure',
		's_shut_down_for_low_pressure',
		's_last_wheel_cycle',
		's_pressuring_time',
		's_pressurization_recon_time',
		's_electical_conn_time',
		's_restart_time',
		'eb_model',
		'eb_contactors',
		'eb_brand',
		'eb_relay_board',
		'eb_protections',
		'eb_main_fuses',
		'eb_main_fuses_comment',
		'eb_panel_fuses',
		'eb_panel_fuses_comment',
		'eb_lightning_arrester_code',
		'eb_voltage_source_code',
		'eb_pressure_sensor_code',
		'area',
	];

	public function farm()
	{
		return $this->belongsTo('Farm');
	}

	public function orders()
	{
		return $this->hasMany('Order');
	}
}