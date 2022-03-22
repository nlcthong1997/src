<?php

namespace App\Core\Authentications\Internal\Api;

use App\Core\Authentications\Internal\Internal;

class Authenticate extends Internal
{
    protected $guard = 'api';

    public function __construct($guard = null)
    {
        if (!is_null($guard)) {
            $this->guard = $guard;
        }
    }
}
