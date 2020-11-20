<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Lista_vehiculoCreateRequest extends FormRequest
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
            'tipoVehi'=>'required',
            'modeloVehi'=>'required',
            'placaVehi'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'documento.required' => 'Se debe ingresar el documento',
            'tipoVehi.required' => 'Se debe seleccionar un tipo de vehiculo',
            'modeloVehi.required' => 'Se debe ingresar el modelo del vehiculo',
            'placaVehi.required' => 'Se debe ingresar la placa del vehiculo',
    ];}
}
