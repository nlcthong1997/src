<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExampleException;
use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Example\ExampleRequest;

class ExampleController extends Controller
{
    public function example(ExampleRequest $request)
    {
        
        if ($request->isMethod('GET')) {
            return view('example.show');
        }
        $validated = $request->validated();
        $min = 10;
        $total = $validated['input1'] + $validated['input2'];
        if ($total > $min) {
            return back()->with('success', 'Success');
        }
        throw new ExampleException(); //default
        throw new ExampleException('custom message');
    }

    public function exampleAPI()
    {
        return response()->jsonSuccess(['a' => 1]);

        throw new BadRequestException(); // default
        throw new BadRequestException('custom message');
    }
}
