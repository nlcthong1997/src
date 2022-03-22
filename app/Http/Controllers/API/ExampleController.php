<?php

namespace App\Http\Controllers\API;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotAcceptableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Example\ExampleAPIRequest;
use Exception;
use Authenticate;

class ExampleController extends Controller
{
    public function exampleLogin()
    {
        return Authenticate::login(['user' => 'thong'], 1, 1);
    }

    public function exampleShow(ExampleAPIRequest $request)
    {
        $validated = $request->validated();
        try {
            $data = [
                'users' => [
                    [
                        'id' => 1,
                        'name' => 'a'
                    ],
                    [
                        'id' => 2,
                        'name' => 'b'
                    ],
                    [
                        'id' => 3,
                        'name' => 'c'
                    ]
                ],
                'description' => 'The list users from api example'
            ];
    
            $option = $validated['option'] ?? null;
            if (!empty($option) && !in_array($option, [1,2])) {
                throw new BadRequestException();
                // or
                // throw new NotAcceptableException('custom message');
            }
            return response()->jsonSuccess($data);
        } catch (Exception $e) {
            throwErr($e);
        }

    }
}
