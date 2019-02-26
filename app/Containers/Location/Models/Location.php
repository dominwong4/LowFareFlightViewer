<?php

namespace App\Containers\Location\Models;

use App\Containers\Country\Models\Country;
use App\Containers\Flights\Models\Flights;
use App\Ship\Parents\Models\Model;

class Location extends Model
{
    protected $fillable = [
        'code',
        'name',
        'country_id'

    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
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
    protected $resourceKey = 'locations';

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function flights(){
        return $this->hasMany(Flights::class);
    }
}
