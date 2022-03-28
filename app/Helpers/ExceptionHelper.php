<?php

use App\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\Log;

if (!function_exists('throwErr')) {
    function throwErr($e)
    {
        $classExceptions = config('exceptions.register');
        $classException = get_class($e);
        if (!in_array($classException, $classExceptions)) {
            Log::error($e);
            throw new InternalErrorException();
        } else {
            $cusMess = $e->getMessage()['message'] ?? null;
            if (is_string($cusMess)) {
                throw new $classException($cusMess);
            }
            throw new $classException();
        }
    }
}