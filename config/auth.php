<?php

return [
    'defaults' => [
        'guard' => 'mahasiswa',
    ],

    'guards' => [
        'mahasiswa' => [
            'driver' => 'jwt',
            'provider' => 'mahasiswas',
        ],
    ],

    'providers' => [
        'mahasiswas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Mahasiswa::class,
        ],
    ],
];