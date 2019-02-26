<?php

namespace App\Containers\Flights\UI\API\Transformers;

use App\Containers\Flights\Models\Flights;
use App\Ship\Parents\Transformers\Transformer;

class FlightsTransformer extends Transformer
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

    /**
     * @param Flights $entity
     *
     * @return array
     */
    public function transform(Flights $entity)
    {
        $response = [
            'object' => 'Flights',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
