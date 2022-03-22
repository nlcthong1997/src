<?php

namespace App\Exceptions;

class InternalServerErrorException extends AppException
{
    /**
     * 
     */
    public function getMessageDefault()
    {
        return __('messages.http.internal_server_error');
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
        return config('constants.http.internal_server_error.code');
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return config('constants.http.internal_server_error.status_code');
    }
}
