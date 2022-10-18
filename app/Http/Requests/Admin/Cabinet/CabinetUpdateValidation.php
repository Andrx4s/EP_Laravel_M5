<?php

namespace App\Http\Requests\Admin\Cabinet;

use Illuminate\Foundation\Http\FormRequest;

class CabinetUpdateValidation extends FormRequest
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
            'cabinetNumber' => 'required|numeric|min:0|not_in:0|digits:3|unique:cabinets,cabinetNumber,'.$this->cabinet->id,
            'name' => 'required',
            'en_name' => 'required',
        ];
    }
}
