<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullName' => 'required',
            'email' => 'required|unique:users',
            'birthday' => 'required|date',
            'phoneNumber' => 'required|unique:users|max:11',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
        ];
    }
}
