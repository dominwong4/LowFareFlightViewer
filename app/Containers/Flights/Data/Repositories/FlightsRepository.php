<?php

namespace App\Containers\Flights\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FlightsRepository
 */
class FlightsRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
