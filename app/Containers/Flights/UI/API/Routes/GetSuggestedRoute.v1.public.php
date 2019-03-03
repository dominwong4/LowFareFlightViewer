<?php

/**
 * @apiGroup           Flights
 * @apiName            suggestedRoute
 *
 * @api                {POST} /v1/suggestedroute Endpoint title here..
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
$router->get('suggestedroute', [
    'as' => 'api_flights_suggested_route',
    'uses'  => 'Controller@suggestedRoute',
    'middleware' => [
      'auth:api',
    ],
]);
