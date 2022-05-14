<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAboutRequest extends FormRequest
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
            'short_text' => 'required',
            'text' => 'required'
        ];
    }

     /**
     * Get the validation error message.
     *
     * @return string
     */
    public function messages()
    {
        return [
            'title.required' => 'გთხოვთ მიუთითოთ სათაური'
        ];
    }
}
