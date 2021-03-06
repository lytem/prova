<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
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
            'specialty.nome'=>'required|unique',




        ];
    }
    public function messages()
    {
        return [
            'specialty.nome.required'=>'campo nome specialit√† √® obbligatorio',


        ];
    }
}
