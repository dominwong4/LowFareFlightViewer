<?php

namespace App\Containers\HKExpress\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Zttp\Zttp;

class GetHKExpressCookiesAction extends Action
{
    public function run()
    {
        $cookies = new \GuzzleHttp\Cookie\CookieJar;
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => config('hkexpress.booking_base_uri'),
            'headers' => [
                'apiKey' => config('hkexpress.booking_api_key')
            ]
        ]);
        $response = $client->request('DELETE', config('hkexpress.booking_url'));

        return $cookies;
    }
}
