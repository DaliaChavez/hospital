<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pacientesUpdateRequest extends FormRequest
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
            'nombre'                => 'required',
            'apellido_P'            => 'required',
            'apellido_M'            => 'required',
            'direccion'             => 'required',
            'telefono'              => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe agregar un nombre',
            'apellido_P.required' => 'Debe agregar un apellido paterno',
            'apellido_M.required' => 'Debe agregar un apellido materno',
            'direccion.required' => 'Debe agregar una dirección',
            'telefono.required' => 'Debe agregar un numero de telefono',
            'telefono.integer' => 'Debe agregar solo numeros',
            /*'image.required' => 'Debe seleccionar una imagen para esta entrada',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'image.mime' => 'El archivo debe ser JPG,JPEG o PNG',*/   
        ];
    }
}
