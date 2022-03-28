<?php

namespace App\Core\Authentications;

use App\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\App;
use App\Core\Authentications\Internal\InternalInterface;
use App\Core\Authentications\SSO\SSOInterface;
use App\Core\Authentications\Internal\User\Authenticate as GuardUser;
use App\Core\Authentications\Internal\Admin\Authenticate as GuardAdmin;
use Illuminate\Support\Facades\Log;

class Handler
{
    protected $authType;
    protected $guard;
    protected $serviceType;
    protected $infoData;

    /**
     * make input data
     */
    protected function make(array $input)
    {
        $this->authType     = $input['type']    ?? config('constants.authenticate.internal.type');
        $this->guard        = $input['guard']   ?? config('constants.authenticate.guards.user');
        $this->serviceType  = $input['service'] ?? null;
        $this->infoData     = $input['info']    ?? null;
    }

    /**
     * return instance authenticate
     */
    protected function getAuthenticate()
    {
        switch ($this->authType) {
            case config('constants.authenticate.internal.type'):
                $this->setAuthenticateInternal($this->guard);
                return App::make(InternalInterface::class);
            case config('constants.authenticate.sso.type'):
                $this->setAuthenticateSSO($this->guard, $this->serviceType);
                return App::make(SSOInterface::class);
            default:
                Log::error('Authentication type unknown at '.__FILE__.': Function['.__FUNCTION__.']');
                throw new InternalErrorException();
        }
    }

    /**
     * internal authenticate
     */
    protected function setAuthenticateInternal($guard)
    {
        switch ($guard) {
            case config('constants.authenticate.guards.user'):
                App::bind(InternalInterface::class, function () use($guard) {
                    return new GuardUser($guard);
                });
                break;
            case config('constants.authenticate.guards.admin'):
                App::bind(InternalInterface::class, function () use($guard) {
                    return new GuardAdmin($guard);
                });
                break;
            // case 'other-guard':
            //     // bind other-guard
            //     break;
            default:
                Log::error('The guard type unknown at '.__FILE__.': Function['.__FUNCTION__.']');
                throw new InternalErrorException();
        }
    }

    /**
     * sso authenticate
     */
    protected function setAuthenticateSSO($guard, $service)
    {
        switch ($service) {
            case 1:
                App::bind(SSOInterface::class, function() use($guard) {
                    return new \App\Core\Authentications\SSO\ServiceExample\Authenticate($guard);
                });
                break;
            // case 'apple':
            //     // bind apple
            //     break;
            default:
                Log::error('SSO type unknown at '.__FILE__.': Function['.__FUNCTION__.']');
                throw new InternalErrorException();
        }
    }
}
