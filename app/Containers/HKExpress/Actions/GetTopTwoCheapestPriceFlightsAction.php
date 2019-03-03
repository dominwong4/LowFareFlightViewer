<?php

namespace App\Containers\HKExpress\Actions;

use App\Containers\Flights\Models\Flights;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTopTwoCheapestPriceFlightsAction extends Action
{
    public function run($location)
    {
        $flights = Flights::todayPrices()->status(true)->location($location)->fromCheapest()->get();

        list($departFromLoc,$departFromHKG) = $flights->partition(function($flight) use ($location){
            return $flight['departure_station'] == $location;
        });

        $separated = collect([
            'departFromHKG' => $departFromHKG->groupBy('amount')->take(1),
            'departFromLoc' => $departFromLoc->groupBy('amount')->take(1)
        ]);

        return $separated;
    }
}
