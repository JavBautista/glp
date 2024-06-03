<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerStatus;
use App\Collector;
use App\CollectorStatus;
use App\Shipment;
use App\ShipmentStatus;
use Illuminate\Http\Request;
use PDF;
use App\Exports\ShipmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }

    /*-------------------------------------
    * LINKS ADMIN/SHIPMENTS
    */
    public function shipmentsIndex(){
    	$shipments = Shipment::where('disabled',0)->orderBy('id','desc')->paginate(3);
    	return view('admin.shipments.index',[
    		'shipments'=>$shipments,
    	]);
    }

    public function setSessionFechas(Request $request){
        //Lo que llega a este metodo son dos textos en formato Y-m-d
        $request->session()->put('fecha_ini', $request->fecha_ini);
        $request->session()->put('fecha_fin', $request->fecha_fin);
    }

    public function getShipments(Request $request){
        //if(!$request->ajax()) return redirect('/');

        // Obtener fechas del request o establecer fechas predeterminadas
        $fecha_ini = $request->session()->get('fecha_ini') ? Carbon::parse($request->session()->get('fecha_ini')) : Carbon::now();
        $fecha_fin = $request->session()->get('fecha_fin') ? Carbon::parse($request->session()->get('fecha_fin')) : Carbon::now();

        // Convertir fechas a formato 'Y-m-d'
        $f1 = $fecha_ini->format('Y-m-d');
        $f2 = $fecha_fin->format('Y-m-d');

        $num_paginate=50;
        $buscar      = $request->buscar;
        if($buscar==''){
            //$categorias = Categoria::orderBy('id','desc')->paginate(3);
            $shipments = Shipment::where('disabled',0)
                        ->orderBy('created_at','desc')
                        ->with('status')
                        ->with('remitent')
                        ->with('destinatary')
                        ->whereBetween(DB::raw('DATE(created_at)'), [$f1, $f2])
                        ->paginate($num_paginate);
        }else{
            $shipments = Shipment::where('disabled',0)
                        ->with('status')
                        ->with('remitent')
                        ->with('destinatary')
                        ->whereBetween(DB::raw('DATE(created_at)'), [$f1, $f2])
                        ->whereHas('destinatary', function (Builder $query) use($buscar) {
                            $query->where('name', 'like', '%'.$buscar.'%')
                            ->orWhere('company', 'like', '%'.$buscar.'%')
                            ->orWhere('name', 'like', '%'.$buscar.'%')
                            ->orWhere('movil', 'like', '%'.$buscar.'%')
                            ->orWhere('address', 'like', '%'.$buscar.'%')
                            ->orWhere('city', 'like', '%'.$buscar.'%')
                            ->orWhere('state', 'like', '%'.$buscar.'%');
                        })
                        ->orderBy('created_at','desc')
                        ->paginate($num_paginate);
        }
        //dd($shipments);
        return [
            'pagination'=>[
                'total'=> $shipments->total(),
                'current_page'=> $shipments->currentPage(),
                'per_page'=> $shipments->perPage(),
                'last_page'=> $shipments->lastPage(),
                'from'=> $shipments->firstItem(),
                'to'=> $shipments->lastItem(),
            ],
            'shipments'=>$shipments,
            'fecha_ini'=>$fecha_ini,
            'fecha_fin'=>$fecha_fin,

        ];
    }

    public function shipmentsDetail($shipment_id){
        $shipment = Shipment::find($shipment_id);
        return view('admin.shipments.detail',[
            'shipment'=>$shipment,
        ]);
    }

    public function shipmentsEdit($shipment_id){
        $shipment = Shipment::find($shipment_id);
        $statuses=ShipmentStatus::all();
        return view('admin.shipments.edit',[
            'shipment'=>$shipment,
            'statuses'=>$statuses,
        ]);
    }

    public function shipmentsEditRemitent($shipment_id){
        $shipment = Shipment::find($shipment_id);
        return view('admin.shipments.edit_remitent',[
            'shipment'=>$shipment,
        ]);
    }

    public function shipmentsEditDestinatary($shipment_id){
        $shipment = Shipment::find($shipment_id);
        return view('admin.shipments.edit_destinatary',[
            'shipment'=>$shipment,
        ]);
    }

    public function shipmentsEditStatus($shipment_id){
        $shipment = Shipment::find($shipment_id);
        $statuses=ShipmentStatus::all();
        return view('admin.shipments.edit_status',[
            'shipment'=>$shipment,
            'statuses'=>$statuses,
        ]);
    }

    public function shipmentsEditCosto($shipment_id){
        $shipment = Shipment::find($shipment_id);
        return view('admin.shipments.edit_cost',[
            'shipment'=>$shipment,
        ]);
    }

    public function shipmentsEditDisabled($shipment_id){
        $shipment = Shipment::find($shipment_id);
        return view('admin.shipments.edit_disabled',[
            'shipment'=>$shipment,
        ]);
    }


    /*-------------------------------------
    * LINKS ADMIN/CUSTOMERS
    */
    public function customersIndex(){
        $customers = Customer::orderBy('id','desc')->paginate(10);
        return view('admin.customers.index',[
            'customers'=>$customers,
        ]);
    }


    public function customerCreate(){
    	$statuses=CustomerStatus::all();
    	return view('admin.customers.create',[
    		'statuses'=>$statuses,
    	]);
    }

    public function customerDetail($id){
        $customer = Customer::find($id);
        return view('admin.customers.detail',[
            'customer'=>$customer,
        ]);

    }

    public function customerEdit($id){
        $customer = Customer::find($id);
        return view('admin.customers.edit',[
            'customer'=>$customer,
        ]);
    }

    public function customerResetPass($id){
        $customer = Customer::find($id);
        return view('admin.customers.reset_pass',[
            'customer'=>$customer,
        ]);
    }

    public function customerEditStatus($id){
        $customer = Customer::find($id);
        $statuses=CustomerStatus::all();
        return view('admin.customers.edit_status',[
            'customer'=>$customer,
            'statuses'=>$statuses,
        ]);
    }

    public function customerDelete($id){
        $customer = Customer::find($id);
        return view('admin.customers.delete',[
            'customer'=>$customer,
        ]);
    }

    /*-------------------------------------
    * LINKS ADMIN/COLLECTORS
    */
    public function collectorsIndex(){
        return view('admin.collectors.index');
    }

    public function collectorDetail($id){
        $collector = Collector::find($id);
        return view('admin.collectors.detail',[
            'collector'=>$collector,
        ]);

    }
    /*-------------------------------------*/



    public function shipmentsExportExcel(Request $request){
        $f1= $request->fecha_ini;
        $f2= $request->fecha_fin;
        return Excel::download(new ShipmentsExport($f1,$f2), 'shipments.xlsx');
    }

    public function shipmentsStatusIndex(){
        return view('admin.shipments_statuses.index');
    }

    public function messagesWebIndex(){
        return view('admin.messages_web.index');
    }
}
