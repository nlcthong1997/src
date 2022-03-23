<?php

return [
    'authenticate' => [
        'guards' => [
            'user' => 'user',
            'admin' => 'admin',
        ],
        'internal' => [
            'type' => 1,
        ],
        'sso' => [
            'type' => 2,
            'services' => [
                'google' => 1,
                'facebook' => 2,
                'apple' => 3,
                'twitter' => 4
            ]
        ]
    ]
];
