<?php

use App\Exceptions\InternalErrorException;

if (!function_exists('throwErr')) {
    function throwErr($e)
    {
        $classExceptions = config('exceptions.register');
        $classException = get_class($e);
        if (!in_array($classException, $classExceptions)) {
            throw new InternalErrorException();
        } else {
            throw new $classException();            
        }
    }
}