<?php

namespace App\Containers\Country\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCountriesAction extends Action
{
    public function run(Request $request)
    {
        $countries = Apiato::call('Country@GetAllCountriesTask', [], ['addRequestCriteria']);

        return $countries;
    }
}
