<?php

/**
 * @apiGroup           Flights
 * @apiName            updateFlights
 *
 * @api                {PATCH} /v1/flights/:id Endpoint title here..
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
$router->patch('flights/{id}', [
    'as' => 'api_flights_update_flights',
    'uses'  => 'Controller@updateFlights',
    'middleware' => [
      'auth:api',
    ],
]);
