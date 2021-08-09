<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citaUpdateRequest extends FormRequest
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
            'nombre'            => 'required|string',
            'telefono'          => 'required|integer',
            'edad'              => 'required|integer',
            'peso'              => 'required',
            'talla'             => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre_paciente.required' => 'Debe agregar un nombre',
            'nombre.string' => 'Debe agregar solo letras',
            'telefono.required' => 'Debe agregar un numero de telefono',
            'telefono.integer' => 'Debe agregar solo numeros',
            'edad.required' => 'Debe agregar un edad',
            'edad.integer' => 'Debe agregar solo numeros',
            'peso.required' => 'Debe agregar su peso',
            'talla.required' => 'Debe agregar su talla'
            /*'image.required' => 'Debe seleccionar una imagen para esta entrada',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'image.mime' => 'El archivo debe ser JPG,JPEG o PNG',*/   
        ];
    }
}
