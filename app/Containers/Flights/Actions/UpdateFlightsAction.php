<?php

namespace App\Containers\Flights\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateFlightsAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $flights = Apiato::call('Flights@UpdateFlightsTask', [$request->id, $data]);

        return $flights;
    }
}
