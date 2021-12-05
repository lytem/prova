<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'doctor.nome'=>'required',
            'doctor.cognome'=>'required',
            'doctor.codice_fiscale'=>'required',
            'doctor.telefono'=>'required',
            'doctor.email'=>'required',



        ];
    }
    public function messages()
    {
        return [
            'doctor.nome.required'=>'campo nome obbligatorio',
            'doctor.cognome.required'=>'campo cognome obbligatorio',
            'doctor.codice_fiscale.required'=>'campo codice fiscale obbligatorio',
            'doctor.telefono.required'=>'campo telefono obbligatorio',
            'doctor.email.required'=>'campo email obbligatorio',
        ];
    }
}
