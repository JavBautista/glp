<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShipmentStatus;

class ShipmentStatusesController extends Controller
{
    public function get(Request $request){
    	if(!$request->ajax()) return redirect('/');
    	$statuses = ShipmentStatus::all();
    	return $statuses;
    }

    public function store(Request $request){
    	if(!$request->ajax()) return redirect('/');
    	$status = new ShipmentStatus;
    	$status->status = $request->status;
        $status->description = $request->description;
    	$status->inactive = 0;
    	$status->active = 1;
    	$status->order = 0;
    	$status->save();
    }

    public function update(Request $request){
    	if(!$request->ajax()) return redirect('/');
    	$status = ShipmentStatus::findOrFail($request->id) ;
    	$status->status = $request->status;
        $status->description = $request->description;
    	$status->save();
    }

    public function desactivar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $status = ShipmentStatus::findOrFail($request->id);
        $status->active = '0';
        $status->save();
    }

    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $status = ShipmentStatus::findOrFail($request->id);
        $status->active = '1';
        $status->save();
    }

    public function delete(Request $request){
        if(!$request->ajax()) return redirect('/');
        $status = ShipmentStatus::findOrFail($request->id);
        $status->delete();
    }

}
