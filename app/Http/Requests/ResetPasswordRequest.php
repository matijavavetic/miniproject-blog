<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    /**
     * Validating form data given by the user
     *
     * @throws \Exception
     * @return array
     */
    public function validateData()
    {
        $input = [
            'email' => $this->input('email'),
            'password' => $this->input('password')
        ];

        return $input;
    }
}
