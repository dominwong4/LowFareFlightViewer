<?php

namespace App\Containers\Flights\Tasks;

use App\Containers\Flights\Data\Repositories\FlightsRepository;
use App\Containers\HKExpress\Value\HKExpressResponseValue;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class CreateFlightsTask extends Task
{

    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(HKExpressResponseValue $hkexpressResponseValue)
    {
        try {
            return $this->repository->create([
                'departure_station' => $hkexpressResponseValue->getDepartureStation(),
                'arrival_station' => $hkexpressResponseValue->getArrivalStation(),
                'amount' => $hkexpressResponseValue->getAmount(),
                'status' => $hkexpressResponseValue->getStatus(),
                'flight_date' => Carbon::parse($hkexpressResponseValue->getDate()),
            ]);
        }
        catch (Exception $exception) {
            echo($exception->getMessage());
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
