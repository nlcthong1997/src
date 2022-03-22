<?php

namespace App\Http\Requests\Example;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Request;

class ExampleRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request::isMethod('GET')) {
            return [];
        }
        return [
            'input1' => 'required|numeric|min:3',
            'input2' => 'nullable|numeric|min:5',
        ];
    }
}
