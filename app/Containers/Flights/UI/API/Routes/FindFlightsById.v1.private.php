<?php

/**
 * @apiGroup           Flights
 * @apiName            findFlightsById
 *
 * @api                {GET} /v1/flights/:id Endpoint title here..
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
$router->get('flights/{id}', [
    'as' => 'api_flights_find_flights_by_id',
    'uses'  => 'Controller@findFlightsById',
    'middleware' => [
      'auth:api',
    ],
]);
