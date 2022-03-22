<?php

namespace App\Core\Authentications\Internal;

use App\Core\Authentications\Internal\InternalInterface;
use App\Exceptions\UnauthorizedException;

class Internal implements InternalInterface
{
    protected $guard;

    /**
     * 
     */
    public function __construct($guard = null)
    {
        $this->guard = $guard;
    }

    /**
     * 
     */
    public function register($info)
    {
        // storage user
    }

    /**
     * 
     */
    public function login($info)
    {
        // $info['email_verified_at'] = function($q) {
        //     $q->where('email_verified_at', '<>', null);
        // };
        if (! $token = auth($this->guard)->attempt($info)) {
            throw new UnauthorizedException();
        }
        return $token;
    }

    /**
     * 
     */
    public function me()
    {
        return auth($this->guard)->user();
    }

    /**
     * 
     */
    public function logout()
    {
        auth($this->guard)->logout();
    }
}
