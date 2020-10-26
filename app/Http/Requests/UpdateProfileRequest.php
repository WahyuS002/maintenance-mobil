<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'jk' => 'nullable',
            'foto' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
}
