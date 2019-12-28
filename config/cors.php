<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => [
        'http://h5.jianghu.local',
        'http://madmin.jianghu.local',
        'http://cadmin.jianghu.local',
    ],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['GET', 'POST', 'PUT', 'PATCH'],
    'exposedHeaders' => [],
    'maxAge' => 0,
];
