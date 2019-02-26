<?php

/**
 * @apiGroup           Flights
 * @apiName            deleteFlights
 *
 * @api                {DELETE} /v1/flights/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->delete('flights/{id}', [
    'as' => 'api_flights_delete_flights',
    'uses'  => 'Controller@deleteFlights',
    'middleware' => [
      'auth:api',
    ],
]);
