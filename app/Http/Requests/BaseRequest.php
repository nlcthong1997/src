<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\MessageBag;

class BaseRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        if (Request::is('api/*') || Request::ajax()) {
            $messages = $this->getMessages($validator->errors());
            throw new ValidationException($messages);
        }
    }

    /**
     * 
     */
    protected function getMessages(MessageBag $errors)
    {
        return $errors->messages();
    }
}
