<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExampleException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Example\ExampleRequest;
use Exception;

class ExampleController extends Controller
{
    public function example(ExampleRequest $request)
    {
        
        if ($request->isMethod('GET')) {
            return view('example.show');
        }

        $validated = $request->validated();
        try {
            $min = 10;
            $max = 100;
            $num1 = $validated['input1'];
            $num2 = $validated['input2'] ?? 0;
            $total = $num1 + $num2;
            if ($total > $min && $total < $max) {
                return back()->with('success', 'Success');
            } elseif ($total < $min) {
                throw new ExampleException(); //default
            } else {
                throw new ExampleException('Example custom message');
            }
        } catch (Exception $e) {
            throwErr($e);
        }
    }
}
