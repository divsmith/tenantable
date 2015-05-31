<?php

return [

    'tenant' => [
        /**
         * The Eloquent model associated with individual tenants.
         */
        'model' => 'App\Tenant',

        /**
         * Plural lowercase name of the model used for associations.
         */
        'plural' => 'tenants',

        'route' => [

            /**
             * Route parameter used to identify tenants, i.e.
             *
             *  Route::group([domain => {tenant}.myapp.com ...) or
             *  Route::group([domain => myapp.com/{tenant} ...)
             */
            'parameter' => 'tenant'
        ],

        'database' => [

            /**
             * Database column associated with the route parameter.
             */
            'column' => 'slug'
        ]
    ],

    'user' => [
        /**
         * The Eloquent model associated with users.
         */
        'model' => 'App\User',

        /**
         * Plural lowercase name of the model used for associations.
         */
        'plural' => 'users'
    ]
];