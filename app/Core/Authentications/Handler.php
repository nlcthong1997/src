<?php

namespace App\Core\Authentications;

use App\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\App;

class Handler
{
    protected function setAuthenticateInternal($guard)
    {
        switch ($guard) {
            case config('constants.authenticate.internal.guards.api'):
                App::bind(\App\Core\Authentications\Internal\AuthenticateInterface::class, function () use($guard) {
                    return new \App\Core\Authentications\Internal\Api\Authenticate($guard);
                });
                break;
            // case 'admin':
            //     // bind admin
            //     break;
            // case 'user':
            //     // bind admin
            //     break;
        }
    }

    protected function setAuthenticateSSO($service)
    {
        switch ($service) {
            case config('constants.authenticate.sso.services.facebook'):
                // App::bind(\App\Core\Authentications\Internal\AuthenticateInterface::class, function () use($guardOrService) {
                //     return new \App\Core\Authentications\Internal\Api\Authenticate($guardOrService);
                // });
                break;
            // case 'apple':
            //     // bind apple
            //     break;
        }
    }

    protected function getAuthenticate($type, $guardOrService)
    {
        $authenticate = null;
        switch ($type) {
            case config('constants.authenticate.internal.type'):
                $this->setAuthenticateInternal($guardOrService);
                $authenticate = App::make(\App\Core\Authentications\Internal\AuthenticateInterface::class);
                break;
            case config('constants.authenticate.sso.type'):
                $this->setAuthenticateSSO($guardOrService);
                break;
            default:
                throw new InternalErrorException();
        }
        return $authenticate;
    }
}
