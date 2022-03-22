<?php

namespace App\Exceptions;

class ForbiddenException extends AppException
{
    /**
     * 
     */
    public function getMessageDefault()
    {
        return __('messages.http.forbidden');
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
        return config('constants.http.forbidden.code');
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return config('constants.http.forbidden.status_code');
    }
}
