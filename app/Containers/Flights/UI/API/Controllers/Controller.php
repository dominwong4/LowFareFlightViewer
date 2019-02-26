<?php

namespace App\Containers\Flights\UI\API\Controllers;

use App\Containers\Flights\UI\API\Requests\CreateFlightsRequest;
use App\Containers\Flights\UI\API\Requests\DeleteFlightsRequest;
use App\Containers\Flights\UI\API\Requests\GetAllFlightsRequest;
use App\Containers\Flights\UI\API\Requests\FindFlightsByIdRequest;
use App\Containers\Flights\UI\API\Requests\UpdateFlightsRequest;
use App\Containers\Flights\UI\API\Transformers\FlightsTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Flights\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateFlightsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFlights(CreateFlightsRequest $request)
    {
        $flights = Apiato::call('Flights@CreateFlightsAction', [$request]);

        return $this->created($this->transform($flights, FlightsTransformer::class));
    }

    /**
     * @param FindFlightsByIdRequest $request
     * @return array
     */
    public function findFlightsById(FindFlightsByIdRequest $request)
    {
        $flights = Apiato::call('Flights@FindFlightsByIdAction', [$request]);

        return $this->transform($flights, FlightsTransformer::class);
    }

    /**
     * @param GetAllFlightsRequest $request
     * @return array
     */
    public function getAllFlights(GetAllFlightsRequest $request)
    {
        $flights = Apiato::call('Flights@GetAllFlightsAction', [$request]);

        return $this->transform($flights, FlightsTransformer::class);
    }

    /**
     * @param UpdateFlightsRequest $request
     * @return array
     */
    public function updateFlights(UpdateFlightsRequest $request)
    {
        $flights = Apiato::call('Flights@UpdateFlightsAction', [$request]);

        return $this->transform($flights, FlightsTransformer::class);
    }

    /**
     * @param DeleteFlightsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFlights(DeleteFlightsRequest $request)
    {
        Apiato::call('Flights@DeleteFlightsAction', [$request]);

        return $this->noContent();
    }
}
