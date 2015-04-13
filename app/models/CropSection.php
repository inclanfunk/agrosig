<?php

class CropSection extends \Eloquent {
	protected $fillable = [
		'pivot_id',
		'crop_id',
		'start_angle',
		'stop_angle',
		'variety_or_hybrid',
		'predecessor',
		'years',
		'seeding_system',
		'density',
		'density_type',
		'date_of_seeding',
	];

	public function crop()
	{
		return $this->belongsTo('Crop');
	}

	public function pivot()
	{
		return $this->belongsTo('Pivot');
	}
}