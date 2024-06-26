<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Session;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['customer', 'admin', 'collector']);

        if($request->user()->hasRole('customer'))
            return redirect('/customer');

        if($request->user()->hasRole('collector')){
            $trk=($request->session()->has('trk'))? $request->session()->get('trk'):0;
            if($trk){
                return redirect('/collector/trk/'.$trk);
            }
            return redirect('/collector');
        }


        if($request->user()->hasRole('admin'))
            return redirect('/admin');

        return redirect('/');

    }

    public function passwordReset(Request $request){
        return view('user.reset_password');
    }

    public function updatePassword(Request $request){

        $user_id=$request->user()->id;
        $user = User::find($user_id);
        $user->password = Hash::make( $request->input('password') );
        $user->setRememberToken(Str::random(60));
        $user->save();

        $this->guard()->login($user);

         $request->user()->authorizeRoles(['customer', 'admin', 'collector']);

        if($request->user()->hasRole('customer'))
            return redirect('/customer');

        if($request->user()->hasRole('collector'))
            return redirect('/collector');

        if($request->user()->hasRole('admin'))
            return redirect('/admin');

        return redirect('/');

        //return view('user.reset_password');
    }

     protected function guard()
    {
        return Auth::guard();
    }


}
