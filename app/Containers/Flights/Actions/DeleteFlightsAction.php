<?php

namespace App\Containers\Flights\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteFlightsAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Flights@DeleteFlightsTask', [$request->id]);
    }
}
