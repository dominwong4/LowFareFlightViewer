<?php

namespace App\Containers\Country\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCountryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Country@DeleteCountryTask', [$request->id]);
    }
}
