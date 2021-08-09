<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class medicoRequest extends FormRequest
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
            'especialidad'          => 'required',
            'cedula_Profesional'    => 'required|min:15|max:15|unique:users',
            'email'                 => 'required|email|unique:users',
            'direccion'             => 'required',
            'A_Experiencia'         => 'required|integer',
            'telefono'              => 'required|integer',
            'password'              => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe agregar un nombre para esta entrada',
            'apellido_P.required' => 'Debe agregar un apellido paterno para esta entrada',
            'apellido_M.required' => 'Debe elegir un apellido materno para esta entrada',
            'especialidad.required' => 'Debe agregar una especilidad',
            'cedula_Profesional.required' => 'Debe agregar una cedula profesional',
            'cedula_Profesional.max' => 'Agregar una cedula con 15 digitos',
            'cedula_Profesional.unique' => 'La cedula profesional tiene que ser unica',
            'email.required' => 'Debe introducir un email que contenga al menos una @',
            'direccion.required' => 'Debe agergar una dirección',
            'A_Experiencia.required' => 'Debe agregar la cantidad de años de experiencia',
            'A_Experiencia.integer' => 'Debe agregar solo numeros',
            'telefono.required' => 'Debe agregar un numero de telefono',
            'telefono.integer' => 'Debe agregar solo numeros',
            'password.required' => 'Debe agregar un password',
            'email.unique' => 'El correo electronico debe ser unico',
            /*'image.required' => 'Debe seleccionar una imagen para esta entrada',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'image.mime' => 'El archivo debe ser JPG,JPEG o PNG',*/   
        ];
    }
}
