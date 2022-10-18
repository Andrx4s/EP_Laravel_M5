<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullName' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'phoneNumber' => 'required|max:11|unique:users,phoneNumber,'.$this->user->id,
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
