<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Remitent;
use App\Destinatary;
use App\Shipment;
use App\ShipmentHistory;
use App\ShipmentPackages;
use App\Customer;
use App\User;
use App\Http\Requests\CreateShipmentRequest;

class ShipmentsController extends Controller
{


    private function saveShipmentHistory($shipment_id,$status,$description,$creator_name,$comentary=NULL){
        $id=ShipmentHistory::create([
            'shipment_id'=>$shipment_id,
            'status'=>$status,
            'description'=>$description,
            'creator_name'=>$creator_name,
            'comentary'=>$comentary,
        ]);
        return $id;
    }

    private function genTrackingNumber($customer_id,$shipment_id){
        $today = date("mdis");
        $longitud=3;
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        $tracking_number='';

        for($i=0;$i < $longitud;$i++)
            $tracking_number .= $pattern[mt_rand(0,$max)];

        $tracking_number.=$today.$customer_id.$shipment_id;
        return $tracking_number;
    }

    public function store(CreateShipmentRequest $request){
        if(!$request->ajax()) return redirect('/');
        $remitent = Remitent::create([
            'mail'=> $request->remitent_mail,
            'company'=> $request->remitent_company,
            'name'=> $request->remitent_name,
            'rfc'=> $request->remitent_rfc,
            'phone'=> $request->remitent_phone,
            'movil'=> $request->remitent_movil,
            'zip_code'=> $request->remitent_zip_code,
            'address'=> $request->remitent_address,
            'number_out'=> $request->remitent_number_out,
            'number_int'=> $request->remitent_number_int,
            'district'=> $request->remitent_district,
            'city'=> $request->remitent_city,
            'state'=> $request->remitent_state,
            'reference'=> $request->remitent_reference,
            'detail'=> $request->remitent_detail,
            'content'=> $request->remitent_content,
            'declared_value'=> $request->remitent_declared_value,
        ]);

        $destinary = Destinatary::create([
            'mail'=> $request->destinatary_mail,
            'company'=> $request->destinatary_company,
            'name'=> $request->destinatary_name,
            'rfc'=> $request->destinatary_rfc,
            'department'=> $request->destinatary_department,
            'phone'=> $request->destinatary_phone,
            'movil'=> $request->destinatary_movil,
            'zip_code'=> $request->destinatary_zip_code,
            'address'=> $request->destinatary_address,
            'number_out'=> $request->destinatary_number_out,
            'number_int'=> $request->destinatary_number_int,
            'district'=> $request->destinatary_district,
            'city'=> $request->destinatary_city,
            'state'=> $request->destinatary_state,
            'reference'=> $request->destinatary_reference,
            'detail'=> $request->destinatary_detail,

        ]);


        $user = $request->user();
        $user_id = $user->id;
        $customer= Customer::where('user_id',$user_id)->first();
        $shipment = Shipment::create([
            'cost'=>0,
            'status_id'=>1,
            'remitent_id'=>$remitent->id,
            'destinatary_id'=>$destinary->id,
            'customer_id'=>$customer->id,
            'disabled'=>0,
        ]);

        $paquetes = $request->paquetes;
        //return $paquetes;
        foreach($paquetes as $paquete){
            ShipmentPackages::create([
                'shipment_id'=> $shipment->id,
                'description'=> $paquete['descripcion'],
                'qty'=> $paquete['cantidad'],
                'weight'=> $paquete['peso'],
                'length'=> $paquete['longitud'],
                'width'=> $paquete['ancho'],
                'height'=> $paquete['altura'],
            ]);
        }

        $tracking_number = $this->genTrackingNumber($customer->id,$shipment->id);
        $shipment->tracking_number = $tracking_number;
        $shipment->save();

        $this->saveShipmentHistory($shipment->id,$shipment->status->status,'Creación de envio.',$customer->name);
    }

    public function updateRemitent(Request $request){
        $remitent = Remitent::find($request->input('remitent_id'));
            $remitent->mail= $request->input('remitent_mail');
            $remitent->company= $request->input('remitent_company');
            $remitent->name= $request->input('remitent_name');
            $remitent->rfc= $request->input('remitent_rfc');
            $remitent->phone= $request->input('remitent_phone');
            $remitent->movil= $request->input('remitent_movil');
            $remitent->zip_code= $request->input('remitent_zip_code');
            $remitent->address= $request->input('remitent_address');
            $remitent->number_out= $request->input('remitent_number_out');
            $remitent->number_int= $request->input('remitent_number_int');
            $remitent->district= $request->input('remitent_district');
            $remitent->city= $request->input('remitent_city');
            $remitent->state= $request->input('remitent_state');
            $remitent->reference= $request->input('remitent_reference');
            $remitent->detail= $request->input('remitent_detail');
            $remitent->content= $request->input('remitent_content');
            $remitent->declared_value= $request->input('remitent_declared_value');
        $remitent->save();
        Session::flash('alert', 'Datos de remitente actualizados satisfactoriamente! ');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/shipments/detail/".$request->input('shipment_id'));


    }
    public function updateDestinatary(Request $request){
        $destinatary = Destinatary::find($request->input('destinatary_id'));
            $destinatary->mail= $request->input('destinatary_mail');
            $destinatary->company= $request->input('destinatary_company');
            $destinatary->name= $request->input('destinatary_name');
            $destinatary->rfc= $request->input('destinatary_rfc');
            $destinatary->department= $request->input('destinatary_department');
            $destinatary->phone= $request->input('destinatary_phone');
            $destinatary->movil= $request->input('destinatary_movil');
            $destinatary->zip_code= $request->input('destinatary_zip_code');
            $destinatary->address= $request->input('destinatary_address');
            $destinatary->number_out= $request->input('destinatary_number_out');
            $destinatary->number_int= $request->input('destinatary_number_int');
            $destinatary->district= $request->input('destinatary_district');
            $destinatary->city= $request->input('destinatary_city');
            $destinatary->state= $request->input('destinatary_state');
            $destinatary->reference= $request->input('destinatary_reference');
            $destinatary->detail= $request->input('destinatary_detail');
            $destinatary->weight= $request->input('destinatary_weight');
            $destinatary->unit_measure= $request->input('destinatary_unit_measure');
        $destinatary->save();
        Session::flash('alert', 'Datos de destinatario actualizados satisfactoriamente! ');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/shipments/detail/".$request->input('shipment_id'));
    }
    public function updateDisabled(Request $request){

        $shipment= Shipment::find($request->input('shipment_id'));
        $shipment->disabled=1;
        $shipment->save();


        Session::flash('alert', 'Envio dado de baja satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/shipments/detail/".$request->input('shipment_id'));
    }

    public function updateCost(Request $request){
        $user = $request->user();
        $shipment= Shipment::find($request->input('shipment_id'));
        $shipment->cost= $request->input('cost');
        $shipment->save();

        //$this->saveShipmentHistory($shipment->id,$shipment->status->status,'Actualización de costo de envio: $'.$shipment->cost,$user->name);

        Session::flash('alert', 'Costo de Envio actualziado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/shipments/detail/".$request->input('shipment_id'));

    }

    public function updateStatus(Request $request){

        $commentary = $request->input('commentary');
        $user = $request->user();
        $shipment= Shipment::find($request->input('shipment_id'));
        $shipment->status_id= $request->input('status');
        $shipment->save();

        //$this->saveShipmentHistory($shipment->id,$shipment->status->status,'Actualización de status de envio: '.$shipment->status->status,$user->name);
        $shipment_history =ShipmentHistory::create([
            'shipment_id'=>$shipment->id,
            'status'=>$shipment->status->status,
            'description'=>'Actualización de status de envio: '.$shipment->status->status,
            'creator_name'=>$user->name,
            'comentary'=>$commentary,
        ]);

        if($request->hasFile('image')){
           $shipment_history->image = $request->file('image')->store('shipments', 'public');
           $shipment_history->save();
        }

        Session::flash('alert', 'Status de Envio actualizado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/admin/shipments/detail/".$request->input('shipment_id'));

    }

    public function shipmentUpdateStatusByCollector(Request $request){

        $commentary = $request->input('commentary');
        $user = User::find($request->input('user_id'));
        $shipment= Shipment::find($request->input('shipment_id'));
        $shipment->status_id= $request->input('status');
        $shipment->save();

        //$this->saveShipmentHistory($shipment->id,$shipment->status->status,'Actualización de status de envio: '.$shipment->status->status,$user->name,$commentary);

        $shipment_history =ShipmentHistory::create([
            'shipment_id'=>$shipment->id,
            'status'=>$shipment->status->status,
            'description'=>'Actualización de status de envio: '.$shipment->status->status,
            'creator_name'=>$user->name,
            'comentary'=>$commentary,
        ]);

        if($request->hasFile('image')){
           $shipment_history->image = $request->file('image')->store('shipments', 'public');
           $shipment_history->save();
        }


        Session::flash('alert', 'Status de Envio actualizado satisfactoriamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect("/tracking-control");

    }
}
