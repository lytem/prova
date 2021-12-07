<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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

            'appointment.data'=>'required',
            'appointment.ora'=>'required',




        ];
    }
    public function messages()
    {
        return [

            'appointment.data.required'=>'campo data obbligatorio',
            'appointment.ora.required'=>'campo ora obbligatorio',

        ];
    }
}
