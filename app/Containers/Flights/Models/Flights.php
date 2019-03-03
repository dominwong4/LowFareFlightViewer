<?php

namespace App\Containers\Flights\Models;

use App\Containers\Location\Models\Location;
use App\Ship\Parents\Models\Model;
use Carbon\Carbon;

class Flights extends Model
{
    protected $fillable = [
        'departure_station',
        'arrival_station',
        'amount',
        'status',
        'flight_date',
        'airline'

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'flights';

    public function departureStation(){
        return $this->belongsTo(Location::class);
    }

    public function arrivalStation(){
        return $this->belongsTo(Location::class);
    }

    public function scopeTodayPrices($query){
        return $query->where('created_at','>',Carbon::now('Asia/Hong_Kong')->startOfDay()->setTimezone('UTC'));
    }

    public function scopeStatus($query,$status){
        return $query->where('status',$status);
    }

    public function scopeLocation($query,$locationCode){
        return $query->where('departure_station',$locationCode)->orWhere('arrival_station',$locationCode);
    }

    public function scopeFromCheapest($query){
        return $query->orderBy('amount','asc');
    }

    public function scopePriceTrend($query,$departureStation,$arrivalStation,$date){
        return $query->where('departure_station',$departureStation)->where('arrival_station',$arrivalStation)->where('flight_date',$date);
    }
}
