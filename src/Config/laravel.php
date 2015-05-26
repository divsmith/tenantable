<?php

return [

    'tenant' => [
        'model' => 'App\Tenant',
        'plural' => 'tenants',

        'route' => [
            'parameter' => 'tenant'
        ],

        'database' => [
            'column' => 'slug'
        ]
    ],

    'user' => [
        'model' => 'App\User',
        'plural' => 'users'
    ]
];