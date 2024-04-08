<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Municipios;
use Illuminate\Http\Request;


class CommonsController extends Controller
{
	public function getEstados(Request $request){
		if(!$request->ajax()) return redirect('/');
		$estados = Estados::all();
		return $estados;
	}

	public function getMunicipio(Request $request,$id){
		if(!$request->ajax()) return redirect('/');
		$municipios = Municipios::where('estado_id',$id)->get();
		return $municipios;
	}

}
