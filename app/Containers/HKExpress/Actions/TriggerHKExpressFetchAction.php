<?php

namespace App\Containers\HKExpress\Actions;

use App\Containers\Country\Models\Country;
use App\Containers\HKExpress\Jobs\GetAllHKExpressFlightsJob;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Carbon\Carbon;

class TriggerHKExpressFetchAction extends Action
{

    /** @var Carbon $startDate */
    private $startDate;
    /** @var Carbon $endDate */
    private $endDate;

    private $departureStation;
    private $arrivalStation;

    private $delay = 0;
    public function run()
    {
        $this->departureStation = "HKG";
        Country::find(5)->locations->each(function($location,$key){
            $this->arrivalStation = $location->code;
            $this->startDate = Carbon::parse(Carbon::now()->setTimezone('Asia/Hong_Kong'))->format('Y-m-d');
            /** @var Carbon $endDate */
            $this->endDate = Carbon::parse(Carbon::now()->setTimezone('Asia/Hong_Kong')->addDays(7))->format('Y-m-d');
            while (Carbon::parse($this->startDate)->diffInDays(Carbon::now())<365){
                $this->startDate = Carbon::parse($this->startDate)->addDays(8)->format('Y-m-d');
                $this->endDate = Carbon::parse($this->startDate)->addDay(7)->format('Y-m-d');
                GetAllHKExpressFlightsJob::dispatch($this->departureStation,$this->arrivalStation,$this->startDate,$this->endDate)->delay(now()->addSeconds($this->delay));
                $this->delay+=3;
            }
        });
    }
}
