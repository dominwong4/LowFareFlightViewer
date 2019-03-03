<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-02-27
 * Time: 00:17
 */

namespace App\Containers\Flights\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;

class SuggestedRouteTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];
    public function transform($entity)
    {

        $response = [
            'flight' => $entity->toArray(),
        ];

        return $response;
    }
}
