<?php

return [
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