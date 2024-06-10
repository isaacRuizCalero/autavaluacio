<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usuaris',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuaris',
        ],
    ],

    'providers' => [
        'usuaris' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuari::class,
        ],
    ],

    'passwords' => [
        'usuaris' => [
            'provider' => 'usuaris',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
