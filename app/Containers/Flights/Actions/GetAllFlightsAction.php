<?php

namespace App\Containers\Flights\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllFlightsAction extends Action
{
    public function run(Request $request)
    {
        $flights = Apiato::call('Flights@GetAllFlightsTask', [], ['addRequestCriteria']);

        return $flights;
    }
}
