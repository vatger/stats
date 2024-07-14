<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteLeg extends Model
{
    protected $table = "event_routelegs";

    protected $appends = [
        'my_pivot',
    ];

    public function getMyPivotAttribute(): ?User
    { //hm
        if (!auth()->check()) return null;
        $data = $this->accounts()->wherePivot('user_id', auth()->id())->first();
        if(is_null($data)) return null;
        return $data->pivot;
    }


    public function route(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EventRoute::class, 'route_id', 'id');
    }

    public function accounts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_account_routelegs','routeleg_id','user_id')->withPivot('completed_at', 'fight_data_id');
    }

    public function departureAerodrome(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Aerodrome::class, 'id', 'departureaerodrome_id');
    }

    public function arrivalAerodrome(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Aerodrome::class, 'id', 'arrivalaerodrome_id');
    }

    public function flightData(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(FlightData::class, 'id', 'flight_data_id');
    }
}
