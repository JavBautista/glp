<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Remitent;
use App\Destinatary;
use App\Shipment;
use App\ShipmentStatus;
use App\ShipmentHistory;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class TrackingControlController extends Controller
{
    public function index(){
    	return view('tracking_control.index');
    }

    public function findTrackingNumber(Request $request){
    	
    	$trk= $request->input('tracking_number');
    	$credentials = $request->only('email', 'password');
    	
    	if (!Auth::once($credentials)){    		
    		Session::flash('alert', 'Usuario y/o Password Incorrecto!');
			Session::flash('alert-class', 'alert-danger');
        	return redirect("/tracking-control"); 
    	}

    	$user = User::where('email',$request->input('email'))->first();
    	$shipment = Shipment::where('tracking_number',$trk)->first();
    	$shipment_statuses = ShipmentStatus::all();    	
    	if(!$shipment){
    		Session::flash('alert', 'Numero no localizado!');
			Session::flash('alert-class', 'alert-danger');
        	return redirect("/tracking-control");  
    	}

    	return view('tracking_control.shipment',[
    		'shipment'=>$shipment,
    		'shipment_statuses'=>$shipment_statuses,
    		'user'=>$user,
    	]);

    }

}
