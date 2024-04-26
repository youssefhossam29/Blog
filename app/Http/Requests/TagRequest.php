<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TagRequest extends FormRequest
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
            'tag'=>'required | unique:tags'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = $validator->errors()->all();
    //     //dd($errors);
    //     Alert::error('Error Title', $errors);
    //     return redirect()->back();
    // }
}
