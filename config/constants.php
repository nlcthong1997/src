<?php

return [
    'authenticate' => [
        'internal' => [
            'type' => 1,
            'guards' => [
                'api' => 1,
                'admin' => 2,
            ],
        ],
        'sso' => [
            'type' => '2',
            'services' => [
                'google' => 1,
                'facebook' => 2,
                'apple' => 3,
                'twitter' => 4
            ]
        ]
    ]
];
