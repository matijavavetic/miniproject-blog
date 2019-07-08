<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

    /**
     * Validating data for a blog post
     *
     * @return array
     */
    public function validationData()
    {
        $input = [
            'title'   => $this->input('title'),
            'body'    => $this->input('body'),
            'image'   => $this->input('image'),
            'user_id' => $this->auth->id()
        ];
        return $input;
    }
}
}
