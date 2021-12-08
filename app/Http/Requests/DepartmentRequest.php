<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'department.nome'=>'required',
            'department.indirizzo'=>'required',
            'department.email'=>'required|email|max:191'





        ];
    }
    public function messages()
    {
        return [
            'department.nome.required'=>'campo nome reparto è obbligatorio',
            'department.indirizzo.required'=>'campo indirizzo è obbligatorio',
            'department.email.required'=>'campo email è obbligatorio',
            'department.email'=>'il campo email invalid,form example:example@example.com'


        ];
    }
}
