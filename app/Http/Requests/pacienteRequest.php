<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pacienteRequest extends FormRequest
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
            'nombre'                => 'required|string',
            'apellido_P'            => 'required',
            'apellido_M'            => 'required',
            'datepicker'            => 'required',
            'email'                 => 'required|email|unique:users',
            'direccion'             => 'required',
            'telefono'              => 'required|integer',
            'password'              => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe agregar un nombre',
            'nombre.string' => 'Debe agregar solo letras',
            'apellido_P.required' => 'Debe agregar un apellido paterno',
            'apellido_M.required' => 'Debe agregar un apellido materno',
            'email.required' => 'Debe introducir un email que contenga al menos una @',
            'direccion.required' => 'Debe agregar una dirección',
            'telefono.required' => 'Debe agregar un numero de telefono',
            'telefono.integer' => 'Debe agregar solo numeros',
            'password.required' => 'Debe agregar un password',
            'datepicker.required' => 'Debe agregar una fecha de nacimiento',
            'email.unique' => 'El correo debe de ser unico',
            /*'image.required' => 'Debe seleccionar una imagen para esta entrada',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'image.mime' => 'El archivo debe ser JPG,JPEG o PNG',*/   
        ];
    }
}
