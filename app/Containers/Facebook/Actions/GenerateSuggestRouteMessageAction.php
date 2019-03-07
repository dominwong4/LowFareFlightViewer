<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-06
 * Time: 01:29
 */

namespace App\Containers\Facebook\Actions;


use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Facebook\Value\FacebookMessage;
use App\Ship\Parents\Actions\Action;

class GenerateSuggestRouteMessageAction extends Action
{
    public function run($location, $limit)
    {
        $routes = Apiato::call('HKExpress@GetSuggestRouteAction', [$location, $limit]);

        $facebookMessage = new FacebookMessage($routes->all());

        return $facebookMessage;

    }

}
