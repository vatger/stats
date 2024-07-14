<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Aerodrome extends Model
{
	protected $table = "navigation_aerodromes";


	/**
	 * Is something in the vicinity of the airport?
	 */
	public function containsCoordinates(float $latitude, float $longitude): bool
    {
        return $latitude < $this->latitude + 0.06 && $latitude > $this->latitude - 0.06
            && $longitude < $this->longitude + 0.06 && $longitude > $this->longitude - 0.06;
    }

}
