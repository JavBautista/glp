<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShipmentRequest extends FormRequest
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
            /*
            'remitent_mail'=>'max:100|email',
            'destinatary_mail'=>'max:100|email',
            */

            'remitent_name'=>'required',
            'remitent_phone'=>'required|max:15',
            'remitent_movil'=>'required|max:15',
            'remitent_zip_code'=>'required',
            'remitent_address'=>'required',
            'remitent_number_out'=>'required',
            'remitent_district'=>'required',
            'remitent_city'=>'required',
            'remitent_state'=>'required',
            'remitent_reference'=>'required',
            'remitent_detail'=>'required',
            'remitent_content'=>'required',
            
            'destinatary_name'=>'required',
            'destinatary_phone'=>'required|max:15',
            'destinatary_movil'=>'required|max:15',
            'destinatary_zip_code'=>'required',
            'destinatary_address'=>'required',
            'destinatary_number_out'=>'required',
            'destinatary_district'=>'required',
            'destinatary_city'=>'required',
            'destinatary_state'=>'required',
            'destinatary_reference'=>'required',
            'destinatary_detail'=>'required',
        ];
    }

     public function messages(){
        return [
            /*
            'remitent_mail.email'=>'Ingrese un formato de correo correcto.',            
            'destinatary_mail.email'=>'Ingrese un formato de correo correcto.',
            'remitent_mail.max'=>'Esta campo no puede contener mas de 100 caracteres.',            
            'destinatary_mail.max'=>'Esta campo no puede contener mas de 100 caracteres.',
            */
            'remitent_name.required'=>'Esta campo es obligatorio.',            
            'remitent_phone.required'=>'Esta campo es obligatorio.', 
            'remitent_movil.required'=>'Esta campo es obligatorio.', 
            'remitent_zip_code.required'=>'Esta campo es obligatorio.', 
            'remitent_address.required'=>'Esta campo es obligatorio.', 
            'remitent_number_out.required'=>'Esta campo es obligatorio.', 
            'remitent_district.required'=>'Esta campo es obligatorio.', 
            'remitent_city.required'=>'Esta campo es obligatorio.', 
            'remitent_state.required'=>'Esta campo es obligatorio.', 
            'remitent_reference.required'=>'Esta campo es obligatorio.', 
            'remitent_detail.required'=>'Esta campo es obligatorio.', 
            'remitent_content.required'=>'Esta campo es obligatorio.', 
            
            'destinatary_name.required'=>'Esta campo es obligatorio.', 
            'destinatary_phone.required'=>'Esta campo es obligatorio.', 
            'destinatary_movil.required'=>'Esta campo es obligatorio.', 
            'destinatary_zip_code.required'=>'Esta campo es obligatorio.', 
            'destinatary_address.required'=>'Esta campo es obligatorio.', 
            'destinatary_number_out.required'=>'Esta campo es obligatorio.', 
            'destinatary_district.required'=>'Esta campo es obligatorio.', 
            'destinatary_city.required'=>'Esta campo es obligatorio.', 
            'destinatary_state.required'=>'Esta campo es obligatorio.', 
            'destinatary_reference.required'=>'Esta campo es obligatorio.', 
            'destinatary_detail.required'=>'Esta campo es obligatorio.', 
            'destinatary_weight.required'=>'Esta campo es obligatorio.', 
            'destinatary_unit_measure.required'=>'Esta campo es obligatorio.', 
                      
            'remitent_phone.max'=>'Este no puede tener mas de 15 caracteres.',
            'remitent_movil.max'=>'Este no puede tener mas de 15 caracteres.',
            'destinatary_phone.max'=>'Este no puede tener mas de 15 caracteres.',
            'destinatary_movil.max'=>'Este no puede tener mas de 15 caracteres.',

            //'remitent_zip_code.max'=>'Este campo no puede tener mas de 5 caracteres.',
            //'destinatary_zip_code.max'=>'Este campo no puede tener mas de 5 caracteres.',   

            //'remitent_zip_code.integer'=>'Este campo solo puede contener numeros.',
            //'destinatary_zip_code.integer'=>'Este campo solo puede contener numeros.',         
        ];
    }
}
