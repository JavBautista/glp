<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Monolog\Handler\mail;

class UpdateCollectorRequest extends FormRequest
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
            'name.required'=>'Este campo es obligatorio.',
            'rfc.required'=>'Este campo es obligatorio.',
            'phone.required'=>'Este campo es obligatorio.',
            'phone.max'=>'Este no puede tener mas de 15 caracteres.',
            'movil.required'=>'Este campo es obligatorio.',
            'movil.max'=>'Este no puede tener mas de 15 caracteres.',
            'address.required'=>'Este campo es obligatorio.',
            'number_out.required'=>'Este campo es obligatorio.',
            'zip_code.required'=>'Este campo es obligatorio.',
            'district.required'=>'Este campo es obligatorio.',
            'city.required'=>'Este campo es obligatorio.',
            'state.required'=>'Este campo es obligatorio.',
            'reference.required'=>'Este campo es obligatorio.',
            'detail.required'=>'Este campo es obligatorio.',
        ];
    }
}
