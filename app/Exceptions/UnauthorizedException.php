<?php

namespace App\Exceptions;

class UnauthorizedException extends AppException
{
    /**
     * 
     */
    public function getMessageDefault()
    {
        return __('messages.http.unauthorized');
    }

    /**
     * 
     */
    public function getDataDefault()
    {
        return null;
    }


    /**
     * 
     */
    public function getCodeDefault()
    {
        return config('constants.http.unauthorized.code');
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return config('constants.http.unauthorized.status_code');
    }
}
