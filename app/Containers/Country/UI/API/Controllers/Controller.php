<?php

namespace App\Containers\Country\UI\API\Controllers;

use App\Containers\Country\UI\API\Requests\CreateCountryRequest;
use App\Containers\Country\UI\API\Requests\DeleteCountryRequest;
use App\Containers\Country\UI\API\Requests\GetAllCountriesRequest;
use App\Containers\Country\UI\API\Requests\FindCountryByIdRequest;
use App\Containers\Country\UI\API\Requests\UpdateCountryRequest;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Country\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCountry(CreateCountryRequest $request)
    {
        $country = Apiato::call('Country@CreateCountryAction', [$request]);

        return $this->created($this->transform($country, CountryTransformer::class));
    }

    /**
     * @param FindCountryByIdRequest $request
     * @return array
     */
    public function findCountryById(FindCountryByIdRequest $request)
    {
        $country = Apiato::call('Country@FindCountryByIdAction', [$request]);

        return $this->transform($country, CountryTransformer::class);
    }

    /**
     * @param GetAllCountriesRequest $request
     * @return array
     */
    public function getAllCountries(GetAllCountriesRequest $request)
    {
        $countries = Apiato::call('Country@GetAllCountriesAction', [$request]);

        return $this->transform($countries, CountryTransformer::class);
    }

    /**
     * @param UpdateCountryRequest $request
     * @return array
     */
    public function updateCountry(UpdateCountryRequest $request)
    {
        $country = Apiato::call('Country@UpdateCountryAction', [$request]);

        return $this->transform($country, CountryTransformer::class);
    }

    /**
     * @param DeleteCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCountry(DeleteCountryRequest $request)
    {
        Apiato::call('Country@DeleteCountryAction', [$request]);

        return $this->noContent();
    }
}
