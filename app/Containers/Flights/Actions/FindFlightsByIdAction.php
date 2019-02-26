<?php

namespace App\Containers\Flights\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindFlightsByIdAction extends Action
{
    public function run(Request $request)
    {
        $flights = Apiato::call('Flights@FindFlightsByIdTask', [$request->id]);

        return $flights;
    }
}
