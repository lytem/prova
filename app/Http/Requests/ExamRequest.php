<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'exam.nome'=>'required',
            'exam.costo'=>'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'exam.nome.required'=>'campo nome esame obbligatorio',
            'exam.costo.integer'=>'campo costo è intero',
        ];
    }
}
