<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'name'=>'required',
            'rfc'=>'required',
            'phone'=>'required|max:15',
            'movil'=>'required|max:15',
            'address'=>'required',
            'number_out'=>'required',
            'zip_code'=>'required',
            'district'=>'required',
            'city'=>'required',
            'state'=>'required',
            'reference'=>'required',
            'detail'=>'required',
        ];
    }

    public function messages(){
        return [
        'email.required' => 'El campo email es obligatorio.',
        'email.email' => 'El formato del email no es válido.',
        'email.unique' => 'Este email ya está en uso.',

        'password.required' => 'El campo contraseña es obligatorio.',
        'password.string' => 'La contraseña debe ser una cadena de caracteres.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'password.confirmed' => 'La confirmación de la contraseña no coincide.',

        'name.required' => 'El campo nombre es obligatorio.',
        'rfc.required' => 'El campo RFC es obligatorio.',

        'phone.required' => 'El campo teléfono es obligatorio.',
        'phone.max' => 'El teléfono no puede tener más de :max caracteres.',

        'movil.required' => 'El campo móvil es obligatorio.',
        'movil.max' => 'El móvil no puede tener más de :max caracteres.',

        'address.required' => 'El campo dirección es obligatorio.',
        'number_out.required' => 'El campo número exterior es obligatorio.',

        'zip_code.required' => 'El campo código postal es obligatorio.',
        //'zip_code.max' => 'El código postal no puede tener más de :max caracteres.',
        //'zip_code.integer' => 'El código postal solo puede contener números.',

        'district.required' => 'El campo colonia es obligatorio.',
        'city.required' => 'El campo ciudad es obligatorio.',
        'state.required' => 'El campo estado es obligatorio.',
        'reference.required' => 'El campo referencia es obligatorio.',
        'detail.required' => 'El campo detalle es obligatorio.',
        ];
    }
}
