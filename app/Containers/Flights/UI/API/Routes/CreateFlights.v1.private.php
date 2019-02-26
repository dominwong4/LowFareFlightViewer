<?php

/**
 * @apiGroup           Flights
 * @apiName            createFlights
 *
 * @api                {POST} /v1/flights Endpoint title here..
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
$router->post('flights', [
    'as' => 'api_flights_create_flights',
    'uses'  => 'Controller@createFlights',
    'middleware' => [
      'auth:api',
    ],
]);
