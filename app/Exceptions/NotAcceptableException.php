<?php

namespace App\Exceptions;

class NotAcceptableException extends AppException
{
    /**
     * 
     */
    public function getMessageDefault()
    {
        return __('messages.http.not_acceptable');
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
        return config('constants.http.not_acceptable.code');
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return config('constants.http.not_acceptable.status_code');
    }
}
