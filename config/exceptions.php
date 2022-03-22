<?php

return [
    'register' => [
        App\Exceptions\ExampleException::class,
        App\Exceptions\BadRequestException::class,
        App\Exceptions\ForbiddenException::class,
        App\Exceptions\NotAcceptableException::class,
        App\Exceptions\NotFoundException::class,
        App\Exceptions\UnauthorizedException::class,
    ],

    'exclude' => [
        App\Exceptions\InternalErrorException::class,
    ],
    
    'http' => [
        'created' => [
            'status_code' => 201,
            'code' => 'CREATED'
        ],
        'success' => [
            'status_code' => 200,
            'code' => 'SUCCESS'
        ],
        'bad_request' => [
            'status_code' => 400,
            'code' => 'ERROR_BAD_REQUEST'
        ],
        'unauthorized' => [
            'status_code' => 401,
            'code' => 'ERROR_UNAUTHORIZED'
        ],
        'not_found' => [
            'status_code' => 404,
            'code' => 'ERROR_NOT_FOUND'
        ],
        'forbidden' => [
            'status_code' => 403,
            'code' => 'ERROR_FORBIDDEN'
        ],
        'not_acceptable' => [
            'status_code' => 406,
            'code' => 'ERROR_NOT_ACCEPTABLE'
        ],
        'internal_server_error' => [
            'status_code' => 500,
            'code' => 'ERROR_INTERNAL_SERVER'
        ]
    ]
];
