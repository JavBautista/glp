<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomersController extends Controller
{
    public function store(CreateCustomerRequest $request){
    	
    	$password='secret';
		$user= User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);

        $user
        ->roles()
        ->attach(Role::where('name', 'customer')->first());

        $user_id = $user->id;

    	$customer = Customer::create([
                'mail'  => $request->input('email'),
                'company'  => $request->input('company'),
                'name'  => $request->input('name'),
                'rfc'  => $request->input('rfc'),
                'phone'  => $request->input('phone'),
                'movil'  => $request->input('movil'),
                'address'  => $request->input('address'),
                'number_out'  => $request->input('number_out'),
                'number_int'  => $request->input('number_int'),
                'zip_code' => $request->input('zip_code'),
                'district' => $request->input('district'),
                'city'  => $request->input('city'),
                'state'  => $request->input('state'),
                'reference' => $request->input('reference'),
                'detail'  => $request->input('detail'),
                'observations'  => $request->input('observations'),
                'status_id'  => $request->input('status'),
                'user_id'  => $user_id,
            ]); 

    	Session::flash('alert', 'Cliente creado satisfactoriamente!');
		Session::flash('alert-class', 'alert-success');
        return redirect("/admin/customers");         
    }

    public function update(UpdateCustomerRequest $request){
        $customer = Customer::find($request->input('customer_id'));    
        $customer->company = $request->input('company');
        $customer->name = $request->input('name');
        $customer->rfc = $request->input('rfc');
        $customer->phone = $request->input('phone');
        $customer->movil = $request->input('movil');
        $customer->address = $request->input('address');
        $customer->number_out = $request->input('number_out');
        $customer->number_int = $request->input('number_int');
        $customer->zip_code = $request->input('zip_code');
        $customer->district = $request->input('district');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->reference = $request->input('reference');
        $customer->detail = $request->input('detail');
        $customer->observations = $request->input('observations');
        $customer->save();

        $user = User::find($customer->user_id);
        $user->name=$customer->name;
        $user->email=$customer->mail;
        $user->save();

        Session::flash('alert', 'Cliente actualizado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/customers"); 
    }

    public function resetPass(Request $request){
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'customer_id.required' => 'El campo ID del cliente es obligatorio.',
            'customer_id.exists' => 'El ID del cliente proporcionado no existe en la base de datos.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de caracteres.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        $customer = Customer::find($request->input('customer_id'));

        $user = User::find($customer->user_id);
        $user->password= Hash::make($request->password);
        $user->save();

        Session::flash('alert', 'Cliente actualizado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/customers");
    }

    public function updateStatus(Request $request){
        $customer = Customer::find($request->input('customer_id'));    
        $customer->status_id = $request->input('status');
        $customer->save();
        Session::flash('alert', 'Estatus de cliente actualizado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/customers"); 
    }

    public function destroy(Request $request){
        $customer = Customer::find($request->input('customer_id'));    
        $customer->delete();        
        Session::flash('alert', 'Cliente Eliminado Satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/customers"); 
    }
}
