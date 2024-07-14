<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightData extends Model
{

	protected $table = 'statistics_pilots';

	protected $primaryKey = 'id';

	protected $fillable = [
		'account_id',
		'callsign',
        'flight_type',
		'departure_airport',
        'arrival_airport',
        'alternative_airport',
        'aircraft',
        'cruise_altitude',
        'cruise_tas',
        'route',
        'remarks',
        'connected_at',
        'disconnected_at',
        'minutes_online',
	];

	public $dates = [
		'connected_at',
		'disconnected_at',
		'departed_at',
		'arrived_at',
	];

	public function scopeCompleted($query)
	{
		return $query->whereNotNull('departed_at')->whereNotNull('arrived_at');
	}

}
