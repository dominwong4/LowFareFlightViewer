<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-03
 * Time: 22:51
 */

return [
    'config' => [
        'app_id' => env('FACEBOOK_APP_ID', null),
        'app_secret' => env('FACEBOOK_APP_SECRET', null),
        'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v3.2'),
    ],
    'page' => [
        'access_token' => env('FACEBOOK_PAGE_TOKEN',null),
        'id' => env('FACEBOOK_PAGE_ID',null),
    ]
];
