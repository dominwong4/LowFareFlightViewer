<?php

namespace App\Containers\HKExpress\Actions;

use App\Containers\HKExpress\Value\RouteListItem;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Carbon\Carbon;

class GetSuggestRouteAction extends Action
{
    public function run($location,$limit=14)
    {
        $separated = Apiato::call('HKExpress@GetTopTwoCheapestPriceFlightsAction', [$location]);

        $departFromHKG = $separated->get('departFromHKG');
        $departFromLoc = $separated->get('departFromLoc');

        $routeList = collect(); // store whole suggested routeListItem

        $departFromHKG->each(function ($amountGroup) use ($departFromLoc, $routeList ,$limit) {
            $amountGroup->each(function ($flightFromHKG) use ($departFromLoc, $routeList ,$limit) {
                $routeListItem = new RouteListItem();
                $routeListItem->setFrom($flightFromHKG); // set departure From Hong Kong Flight

                $departFromLoc->each(function ($amountGroup) use ($flightFromHKG, $departFromLoc, $routeListItem ,$limit) {
                    $amountGroup->each(function ($flightFromLoc) use ($flightFromHKG, $departFromLoc, $routeListItem ,$limit) {

                        $departureDateFromHKG = Carbon::parse($flightFromHKG->flight_date);
                        $departureDateFromLoc = Carbon::parse($flightFromLoc->flight_date);
                        if ($departureDateFromHKG->lessThan($departureDateFromLoc) &&
                            $departureDateFromHKG->diffInDays($departureDateFromLoc)<$limit &&
                            $departureDateFromHKG->diffInDays($departureDateFromLoc)>=3){
                            $routeListItem->setTo($flightFromLoc);
                        }
                    });
                });

                if(count($routeListItem->getTo())!=0){
                    $routeList->push($routeListItem);
                }
            });
        });


        return $routeList;
    }
}
