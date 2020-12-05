<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaEditRequest extends FormRequest
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
            'documento'=>'min:10',
            'documento'=>'max:10',
            'multa'=>'required',
            'fecha'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'documento.min'=>'El documento debe tener minimo 10 caracteres',
            'documento.max'=>'El documento debe tener maximo 10 caracteres',
            'documento.required' => 'Se debe ingresar el documento',
            'multa.required' => 'Se debe seleccionar una multa',
            'fecha.required' => 'Se debe ingresar la fecha',
    ];}
}
