<?php

namespace App\Core\Authentications;

interface AuthenticateInterface
{
    public function register();

    public function login($argm);

    public function logout($argm);

    public function me($argm);
}
