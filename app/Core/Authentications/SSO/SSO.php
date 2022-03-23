<?php

namespace App\Core\Authentications\SSO;

use App\Core\Authentications\SSO\SSOInterface;
use App\Exceptions\UnauthorizedException;

abstract class SSO implements SSOInterface
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
     * authentication SSO info
     */
    abstract protected function serviceVerify($info);

    /**
     * get socaial network type authentication SSO
     */
    abstract protected function getSocialNetworkType();

    /**
     * get socaial network id from authentication SSO reponese
     */
    abstract protected function getSocialNetworkID($response);


    /**
     * default register
     */
    public function register($info)
    {
        // storage user
    }

    /**
     * default login
     */
    public function login($info)
    {
        $response = $this->serviceVerify($info);
        //storage DB
    }

    /**
     * default get info
     */
    public function me()
    {
        return auth($this->guard)->user();
    }
}
