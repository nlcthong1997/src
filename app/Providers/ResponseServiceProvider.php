<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('jsonError', function ($errMessage, $errData, $errCode, $traceID = 0, $httpCode = 400) {
            return	Response::json( [
				'error' => [
					'messages' => $errMessage,
					'code' => $errCode,
					// 'trace_id' => exportString($traceID),
				]
			], $httpCode);
		});

        Response::macro('jsonSuccess', function ($data = null, $traceID = 0, $httpCode = 200) {
            return	Response::json( [
				'success' => [
					'message' => __('messages.http.success'),
					'code' => config('constants.http.success'),
					// 'trace_id' => exportString($traceID),
                ],
                'body' => $data
			], $httpCode);
		});

        Response::macro('jsonToken', function ($token, $httpCode = 200) {
			return	Response::json( [
				'data' => [
					'access_token' => $token,
					'token_type' => 'bearer',
					'expires_in' => auth()->factory()->getTTL() * 60
				]
			], $httpCode);
		});
    }
}
