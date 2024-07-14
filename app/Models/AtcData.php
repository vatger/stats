<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtcData extends Model
{

	protected $table = 'statistics_atc';

	protected $primaryKey = 'id';

	protected $fillable = [
		'account_id',
        'callsign',
        'frequency',
        'qualification_id',
        'facility_type',
        'connected_at',
        'disconnected_at',
        'minutes_online',
	];

	public $dates = [
		'connected_at',
		'disconnected_at',
	];
}
