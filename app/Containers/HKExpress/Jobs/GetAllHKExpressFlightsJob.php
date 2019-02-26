<?php

namespace App\Containers\HKExpress\Jobs;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Jobs\Job;
use Illuminate\Support\Facades\Log;

/**
 * Class GetAllHKExpressFlightsJob
 */
class GetAllHKExpressFlightsJob extends Job
{
    public $queue = 'flight-query';

    private $departureStation;

    private $arrivalStation;

    private $startDate;

    private $endDate;

    public function __construct(string $departureStation, string $arrivalStation, string $startDate, string $endDate)
    {
        $this->departureStation = $departureStation;
        $this->arrivalStation = $arrivalStation;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function handle()
    {
        $tripCollections = Apiato::call('HKExpress@GetHKExpressFlightAction', [
            $this->departureStation,
            $this->arrivalStation,
            $this->startDate,
            $this->endDate
        ]);
        $tripCollections->each(function ($trip, $key) {
            Apiato::call('HKExpress@StoreHKExpressesFlightTask',[$trip]);
        });
    }

    public function tags()
    {
        return [class_basename($this)];
    }
}
