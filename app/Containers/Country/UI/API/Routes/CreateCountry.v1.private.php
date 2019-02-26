<?php

/**
 * @apiGroup           Country
 * @apiName            createCountry
 *
 * @api                {POST} /v1/countries Endpoint title here..
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
$router->post('countries', [
    'as' => 'api_country_create_country',
    'uses'  => 'Controller@createCountry',
    'middleware' => [
      'auth:api',
    ],
]);
