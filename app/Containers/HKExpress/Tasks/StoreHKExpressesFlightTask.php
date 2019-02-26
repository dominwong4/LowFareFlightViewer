<?php

namespace App\Containers\HKExpress\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HKExpress\Data\Repositories\HKExpressRepository;
use App\Containers\HKExpress\Value\HKExpressResponseValue;
use App\Ship\Parents\Tasks\Task;

/**
 * Class StoreHKExpressesFlightTask
 * @package App\Containers\HKExpress\Tasks
 */
class StoreHKExpressesFlightTask extends Task
{
    public function run(HKExpressResponseValue $hkexpressResponseValue){
        Apiato::call('Flights@CreateFlightsTask',[$hkexpressResponseValue]);
    }
}
