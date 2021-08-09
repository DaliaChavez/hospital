<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citaRequest extends FormRequest
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
            'nombre_paciente'   => 'required',
            'telefono'          => 'required|integer',
            'edad'              => 'required|integer',
            'timepicker'        => 'required',
            'datepicker1'        => 'required',
            'peso'              => 'required',
            'talla'             => 'required',
            'motivo_cita'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre_paciente.required' => 'Debe agregar un nombre',
            'telefono.required' => 'Debe agregar un numero de telefono',
            'telefono.integer' => 'Debe agregar solo numeros',
            'edad.required' => 'Debe agregar un edad',
            'edad.integer' => 'Debe agregar solo numeros',
            'timepicker.required' => 'Debe agregar un hora',
            'datepicker1.required' => 'Debe agregar una fecha para la cita',
            'peso.required' => 'Debe agregar su peso',
            'talla.required' => 'Debe agregar su talla',
            'motivo_cita.required' => 'Debe agregar el motivo de su cita',
            /*'image.required' => 'Debe seleccionar una imagen para esta entrada',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'image.mime' => 'El archivo debe ser JPG,JPEG o PNG',*/   
        ];
    }
}
