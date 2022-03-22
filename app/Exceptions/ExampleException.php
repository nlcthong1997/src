<?php

namespace App\Exceptions;

class ExampleException extends AppException
{
    protected $redirectTo = '';

    /**
     * 
     */
    public function getMessageDefault()
    {
        return "Example message";
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
        return 'ERROR_EXAMPLE_CODE';
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return 400;
    }
}
