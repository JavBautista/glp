<?php

namespace App\Http\Controllers;

use App\Collector;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;

class CollectorsController extends Controller
{
    public function list(Request $request){
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if($buscar==''){
            $collectors = Collector::orderBy('id', 'desc')
                        ->paginate(20);
        }else{
            $collectors = Collector::where($criterio, 'like', '%'.$buscar.'%')
                        ->orderBy('id','desc')
                        ->paginate(20);
        }
        return [
            'pagination'=>[
                'total'=> $collectors->total(),
                'current_page'=> $collectors->currentPage(),
                'per_page'=> $collectors->perPage(),
                'last_page'=> $collectors->lastPage(),
                'from'=> $collectors->firstItem(),
                'to'=> $collectors->lastItem(),
            ],
            'collectors'=>$collectors,
        ];
    }

    public function store(CreateCollectorRequest $request){
        if(!$request->ajax()) return redirect('/');
        $password='secret';
        $user= User::create([
            'name' => $request->name,
            'email' => $request->mail,
            'password' => Hash::make($password),
        ]);
        $user->roles()->attach(Role::where('name', 'collector')->first());

        $user_id = $user->id;
        $collector = Collector::create([
                'mail'  => $request->mail,
                'name'  => $request->name,
                'rfc'  => $request->rfc,
                'phone'  => $request->phone,
                'movil'  => $request->movil,
                'address'  => $request->address,
                'number_out'  => $request->number_out,
                'number_int'  => $request->number_int,
                'zip_code' => $request->zip_code,
                'district' => $request->district,
                'city'  => $request->city,
                'state'  => $request->state,
                'reference' => $request->reference,
                'detail'  => $request->detail,
                'observations'  => $request->observations,
                'active'  => 1,
                'status_id'  => 1,
                'user_id'  => $user_id ,
            ]);
    }

    public function update(UpdateCollectorRequest $request){
        if(!$request->ajax()) return redirect('/');
        $collector = Collector::find($request->collector_id);
        $collector->name = $request->name;
        $collector->rfc = $request->rfc;
        $collector->phone = $request->phone;
        $collector->movil = $request->movil;
        $collector->address = $request->address;
        $collector->number_out = $request->number_out;
        $collector->number_int = $request->number_int;
        $collector->zip_code = $request->zip_code;
        $collector->district = $request->district;
        $collector->city = $request->city;
        $collector->state = $request->state;
        $collector->reference = $request->reference;
        $collector->detail = $request->detail;
        $collector->observations = $request->observations;
        $collector->save();
        $user = User::find($collector->user_id);
        $user->name=$collector->name;
        $user->save();
    }

    public function updateActive(Request $request){
        if(!$request->ajax()) return redirect('/');
        $collector = Collector::find($request->id);
        $collector->active=1;
        $collector->save();
    }

    public function updateInactive(Request $request){
        if(!$request->ajax()) return redirect('/');
        $collector = Collector::find($request->id);
        $collector->active=0;
        $collector->save();
    }


}
