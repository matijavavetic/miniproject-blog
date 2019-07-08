<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'title' => 'required',
            'body'  => 'required'
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
