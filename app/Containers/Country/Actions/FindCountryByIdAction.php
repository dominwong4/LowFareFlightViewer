<?php

namespace App\Containers\Country\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCountryByIdAction extends Action
{
    public function run(Request $request)
    {
        $country = Apiato::call('Country@FindCountryByIdTask', [$request->id]);

        return $country;
    }
}
