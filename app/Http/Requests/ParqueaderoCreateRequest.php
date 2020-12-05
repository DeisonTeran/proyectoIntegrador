<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParqueaderoCreateRequest extends FormRequest
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
            'placa'=>'required',
            'placaVehi'=>'min:6',
            'fecha'=>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'placa.required' => 'Se debe ingresar la placa del vehiculo',
            'placaVehi.min'=>'la placa debe tener minimo 6 caracteres',
            'fecha.required' => 'Se debe ingresar la fecha',
            
    ];}
}
