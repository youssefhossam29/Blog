<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true if the user is authorized to make this request, otherwise false
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'city' => 'required',
            'gender'    => 'required',
            'bio'	   => 'required',
            'facebook'	   => 'required',
            'photo'	   => 'nullable|image',
            'password' => ['nullable', 'min:6', 'confirmed'],
        ];
    }
}
