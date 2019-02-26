<?php

namespace App\Containers\HKExpress\Actions;

use App\Containers\HKExpress\Value\HKExpressResponseValue;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Carbon\Carbon;

class GetHKExpressFlightAction extends Action
{
    public function run(string $departureStation, string $arrivalStation, string $startDate, string $endDate)
    {
        $cookies = Apiato::call('HKExpress@GetHKExpressCookiesAction');

        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => config('hkexpress.availability_base_uri'),
            'headers' => [
                'Content-Type' => 'application/json',
                'apiKey' => config('hkexpress.availability_api_key')
            ]
        ]);

        $response = $client->request('POST', config('hkexpress.availability_url'), [
            'json' => [
                "outboundDepartureStation" => $departureStation,
                "outboundArrivalStation" => $arrivalStation,
                "outboundStartDate" => $startDate,
                "outboundEndDate" => $endDate,
                "returnDepartureStation" => $arrivalStation,
                "returnArrivalStation" => $departureStation,
                "returnStartDate" => $startDate,
                "returnEndDate" => $endDate,
                "tripType" => "Return",
                "cultureCode" => "en-US",
                "adultsNumber" => 1,
                "currency" => "HKD"
            ]
        ]);

        $trips = json_decode($response->getBody()->getContents())->trips;

        $outboundTrip = $trips[0];
        $tripCollection = [];

        foreach($outboundTrip->journeys as $journey){
            $hkexpressResponseValue = new HKExpressResponseValue();
            $hkexpressResponseValue->setArrivalStation($trips[0]->arrivalStation);
            $hkexpressResponseValue->setDepartureStation($trips[0]->departureStation);
            $hkexpressResponseValue->setAmount($journey->amountAdult);
            $hkexpressResponseValue->setDate(Carbon::parse($journey->date));
            $hkexpressResponseValue->setStatus($journey->status);
            $tripCollection[] = $hkexpressResponseValue;
        }
        $returnTrip = $trips[1];
        foreach($returnTrip->journeys as $journey){
            $hkexpressResponseValue = new HKExpressResponseValue();
            $hkexpressResponseValue->setArrivalStation($trips[1]->arrivalStation);
            $hkexpressResponseValue->setDepartureStation($trips[1]->departureStation);
            $hkexpressResponseValue->setAmount($journey->amountAdult);
            $hkexpressResponseValue->setDate(Carbon::parse($journey->date));
            $hkexpressResponseValue->setStatus($journey->status);
            $tripCollection[] = $hkexpressResponseValue;
        }

        if(count($tripCollection) == 0){
            $tripCollection = Apiato::call('HKExpress@GetHKExpressFlightAction',[
                $departureStation,
                $arrivalStation,
                $startDate,
                $endDate,
            ]);
        }

        return collect($tripCollection);
    }
}
