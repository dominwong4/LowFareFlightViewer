<?php

namespace App\Containers\Country\Models;

use App\Containers\Location\Models\Location;
use App\Ship\Parents\Models\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
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
    protected $resourceKey = 'countries';

    public function locations(){
        return $this->hasMany(Location::class);
    }
}
