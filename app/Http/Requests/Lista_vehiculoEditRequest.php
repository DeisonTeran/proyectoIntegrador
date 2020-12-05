<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Lista_vehiculoEditRequest extends FormRequest
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
            'placaVehi'=>'min:6|max:6',
        ];
    }

    public function messages()
    {
        return [
            'placaVehi.min'=>'la placa debe tener minimo 6 caracteres',
            'placaVehi.max'=>'la placa debe tener maximo 6 caracteres',
            'documento.required' => 'Se debe ingresar el documento',
            'tipoVehi.required' => 'Se debe seleccionar un tipo de vehiculo',
            'modeloVehi.required' => 'Se debe ingresar el modelo del vehiculo',
            'placaVehi.required' => 'Se debe ingresar la placa del vehiculo',
    ];}
}
