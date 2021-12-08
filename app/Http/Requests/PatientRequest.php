<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
    public function rules()
    {
        return [
            'patient.nome'=>'required',
            'patient.cognome'=>'required',
            'patient.codice_fiscale'=>'required',
            'patient.telefono'=>'required',
            'patient.email'=>'required|email'



        ];
    }
    public function messages()
    {
        return [
            'patient.nome.required'=>'campo nome obbligatorio',
            'patient.cognome.required'=>'campo cognome obbligatorio',
            'patient.codice_fiscale.required'=>'campo codice fiscale obbligatorio',
            'patient.telefono.required'=>'campo telefono obbligatorio',
            'patient.email.required'=>'campo email obbligatorio',
            'patient.email'=>'il campo email invalid,form example@example.com'
        ];
    }
}
