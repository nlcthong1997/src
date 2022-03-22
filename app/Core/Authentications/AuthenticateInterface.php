<?php

namespace App\Core\Authentications;

interface AuthenticateInterface
{
    public function register();

    public function login($info, $type, $guardOrService);

    public function logout($type, $guardOrService);

    public function me();
}
