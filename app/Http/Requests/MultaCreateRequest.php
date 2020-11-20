<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaCreateRequest extends FormRequest
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
            'documento'=>'required',
            'multa'=>'required',
            'fecha'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'documento.required' => 'Se debe ingresar el documento',
            'multa.required' => 'Se debe seleccionar una multa',
            'fecha.required' => 'Se debe ingresar la fecha',
    ];}
}
