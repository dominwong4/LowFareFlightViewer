<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-06
 * Time: 03:33
 */

namespace App\Containers\Facebook\Actions;


use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Country\Models\Country;
use App\Containers\Facebook\Value\FacebookMessage;
use App\Ship\Parents\Actions\Action;

class PostSuggestRouteMessageByCountryAction extends Action
{
    public function run($country_id,$limit)
    {
        Country::find($country_id)->locations->each(function($location,$key) use ($limit){
            /** @var FacebookMessage $facebookMessage */
            $facebookMessage = Apiato::call('Facebook@GenerateSuggestRouteMessageAction',[$location->code,$limit]);
            if($facebookMessage->isTrue()){
                Apiato::call('Facebook@PostFacebookMessageToPageAction',[$facebookMessage->getMessage()]);
            }
        });
    }
}
