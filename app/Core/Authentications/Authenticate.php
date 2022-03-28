<?php

namespace App\Core\Authentications;

class Authenticate extends Handler implements AuthenticateInterface
{
    /**
     * 
     */
    public function register($argm)
    {
        $this->make($argm);
        return $this->getAuthenticate()->register($this->infoData);
    }

    /**
     * 
     */
    public function login($argm)
    {
        $this->make($argm);
        return $this->getAuthenticate()->login($this->infoData);
    }

    /**
     * 
     */
    public function me($argm)
    {
        $this->make($argm);
        return $this->getAuthenticate()->me();
    }
    
    /**
     * 
     */
    public function logout($guard = null)
    {
        return auth($guard)->logout();
    }
}
