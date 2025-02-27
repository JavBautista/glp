<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collector;
use App\Shipment;
use App\ShipmentHistory;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;

class DashboardCollectorController extends Controller
{
	public function home(){
		return view('collector.index');
	}

    public function trk(Request $request){
        $number_trk=($request->session()->has('trk'))? $request->session()->get('trk'):0;
        $shipment = Shipment::where('tracking_number',$number_trk)->first();
        if($shipment){
            return view('collector.shipment',['shipment_id'=>$shipment->id]);
        }
        Session::flash('alert', 'Número de tracking no localizado.');
        Session::flash('alert-class', 'alert-info');
        return view('collector.index');
    }

    public function getShipment(Request $request, $id){
        if(!$request->ajax()){
            Session::flash('alert', 'Acceso no autorizado.');
            Session::flash('alert-class', 'alert-info');
            return redirect('/collector');
        }
        $error=0;
        $error_msg='';
        $accion='';
        $txt_btn='';
        $entrega=false;
        $shipment = Shipment::find($id);
        if($shipment){
            $status= $shipment->status->status;
            if($status == 'creada'){
                $accion='recolectada';
                $txt_btn= 'Recolecta';
            }elseif($status == 'recolectada'){
                $accion='plaza';
                $txt_btn= 'Llegada a plaza';
            }elseif($status == 'plaza'){
                $accion='ruta';
                $txt_btn= 'Empezar ruta';
            }elseif($status == 'ruta' || $status == 'intento'){
                $entrega = true;
            }else{
                $error_msg='No hay acción que realizar con el envio.';
                $error=1;
            }
        }else{
            $error_msg='Número de tracking no localizado.';
            $error=1;
        }
        return [
                'shipment'=>$shipment,
                'entrega'=>$entrega,
                'accion'=>$accion,
                'txt_btn'=>$txt_btn,
                'error'=>$error,
                'error_msg'=>$error_msg,
            ];
    }

    public function updateStatusShipment(Request $request){



        if(!$request->ajax()){
            Session::flash('alert', 'Acceso no autorizado.');
            Session::flash('alert-class', 'alert-info');
            return redirect('/collector');
        }


        $status = 0;
        $comentary='';
        $name_receiver='';
        $user = $request->user();
        if($request->accion=='recolectada') $status= 2;
        if($request->accion=='plaza') $status= 3;
        if($request->accion=='ruta') $status= 4;
        if($request->accion=='intento') $status= 5;
        if($request->accion=='entregada') $status= 6;
        if($status){
            if($status==5 || $status==6){
                $comentary = $request->comentary;
                $name_receiver = $request->input('name_receiver','');
            }

            $shipment = Shipment::find($request->shipment_id);
            $shipment->status_id = $status;
            $shipment->save();


            $shipment_history =ShipmentHistory::create([
                'shipment_id'=>$shipment->id,
                'status'=>$shipment->status->status,
                'description'=>'Actualización de status de envio: '.$shipment->status->status,
                'creator_name'=>$user->name,
                'comentary'=>$comentary,
                'name_receiver'=>$name_receiver,
            ]);

            if($status==5 || $status==6){
                if ($request->hasFile('image')) {
                    $shipment_history->image = $request->file('image')->store('shipments', 'public');
                    $shipment_history->save();
                }
            }
            Session::forget('trk');
        }
    }

    public function storeImage(Request $request){
        $shipment= Shipment::find($request->id);

        $shipment_history =ShipmentHistory::create([
            'shipment_id'=>$shipment->id,
            'status'=>$shipment->status->status,
            'description'=>'Prueba de guardar ',
            'creator_name'=>'Javi',
            'comentary'=>'lorem ipsum facto',
        ]);

        if($request->hasFile('image')){
            if($request->get('image')){
              $image = $request->get('image');
              $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
              \Image::make($request->get('image'))->save(public_path('images/shipments/').$name);
            }
        }
       $shipment_history->image = $name;
       $shipment_history->save();
       return response()->json(['success' => 'You have successfully uploaded an image'], 200);

    }
}
