<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'pw_lama' => 'required',
            'pw_baru1' => 'required',
            'pw_baru2' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pw_lama.required' => 'This field is required',
            'pw_baru1.required' => 'This field is required',
            'pw_baru2.required' => 'This field is required',
        ];
    }
}
