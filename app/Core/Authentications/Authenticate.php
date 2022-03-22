<?php

namespace App\Core\Authentications;

class Authenticate extends Handler implements AuthenticateInterface
{
    public function register()
    {
        
    }

    public function login($info, $type, $guardOrService)
    {
        return $this->getAuthenticate($type, $guardOrService)->login($info);
    }

    public function logout($type, $guardOrService)
    {
        return $this->getAuthenticate($type, $guardOrService)->logout();
    }

    public function me()
    {

    }
}
