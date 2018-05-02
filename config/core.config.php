<?php
return [
    'slim' => [
        'settings' => [
            'determineRouteBeforeAppMiddleware' => true,
            'displayErrorDetails' => true,
            'addContentLengthHeader' => false,
            'db' => [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'cw3_mod',
                'username' => 'cw3_mod',
                'password' => 'cw3_mod',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ],
        ],
    ],
    "modules" => [
        '\CyberWorks\Modules\Core'
    ],
    "development" => true
];