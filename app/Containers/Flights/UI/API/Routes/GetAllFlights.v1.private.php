<?php

/**
 * @apiGroup           Flights
 * @apiName            getAllFlights
 *
 * @api                {GET} /v1/flights Endpoint title here..
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
$router->get('flights', [
    'as' => 'api_flights_get_all_flights',
    'uses'  => 'Controller@getAllFlights',
    'middleware' => [
      'auth:api',
    ],
]);
