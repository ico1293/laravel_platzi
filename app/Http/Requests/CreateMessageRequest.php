<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // change this to true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /** Note:
        *   each key corresponds to a field of the request
        *   each value can be a string or a array of rules
        */
        return [
            'message' => ['required', 'max:160'],
        ];
    }

    /**
     * Create this to reconfig the request messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message.required' => 'Por favor, escribe tu mensaje.',
            'message.max' => 'El mensaje no pude superar los 160 caracteres.',
        ];
    }   
}
