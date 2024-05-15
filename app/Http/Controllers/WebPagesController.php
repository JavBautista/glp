<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remitent;
use App\Destinatary;
use App\Shipment;
use App\Customer;
use App\ShipmentHistory;
use App\ShipmentStatus;
use App\ContactsForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Mail\ContactFormMail;


class WebPagesController extends Controller
{
	private function calculateProgress($status){
		switch ($status) {
			case 'creada':
					return 10;
				break;
			case 'recolectada':
					return 40;
				break;
			case 'plaza':
					return 60;
				break;
		    case 'ruta':
					return 80;
				break;
			case 'intento' :
					return 95;
				break;
			case 'entregada':
					return 100;
				break;
			default:
				return 0;
				break;
		}
		return 0;
	}

	public function index(){
		return view('welcome');
	}


	public function blog(){
		return view('web.blog');
	}

	public function about(){
		return view('web.about');
	}

	public function services(){
		return view('web.services');
	}

	public function contact(){
		return view('web.contact');
	}

    public function searchTrackingNumber(Request $request){
    	$tracking_number = $request->input('tracking-number');
        $shipment = Shipment::where('tracking_number', $tracking_number)->first();
        if($shipment==null){
			return view('web.tracking_number_not_found',['tracking_number'=>$tracking_number]);
        }

        $progress = $this->calculateProgress($shipment->status->status);

        $statuses = ShipmentStatus::where('active',1)->orderBy('id','asc')->get();
        return view('web.search_tracking_number',[
            'shipment'=>$shipment,
            'progress'=>$progress,
            'statuses'=>$statuses,
        ]);
    }

    public function viewImage($type,$name){
    	$image = Storage::disk('public')->url($type.'/'.$name);
    	return view('web.image',[
            'image'=>$image,
        ]);
    }

    public function searchNumberTracking(Request $request){

    	return view('web.search_number_tracking');
    }

    public function  findSearchNumberTracking(){

    	$val_str = request('trackings');
    	$val_str =str_replace(' ', '', $val_str);
    	$array_trackings = explode(",",$val_str);

    	$trackins =[];
    	foreach ($array_trackings as $trk) {
    		$shipment = Shipment::where('tracking_number', $trk)->first();
    		if($shipment){
    			$trackins[$trk]=$shipment;
    		}else{
    			$trackins[$trk]=NULL;
    		}
    	}


    	return view('web.result_search_number_tracking',['trackins'=>$trackins]);

    }


    public function storeContactForm(Request $request){
    	$request->validate([
		    'name' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255',
		    'phone' => 'required|string|max:15',
		    'message' => 'required|string|max:1000', // Por ejemplo, establecemos un límite de 1000 caracteres para el mensaje
		], [
		    // Mensajes de error personalizados
		    'name.required' => 'El nombre es obligatorio.',
		    'email.required' => 'El correo electrónico es obligatorio.',
		    'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
		    'phone.required' => 'El teléfono es obligatorio.',
		    'phone.max' => 'El teléfono no puede exceder los 15 carecteres.',
		    'message.required' => 'El mensaje es obligatorio.',
		    'message.max' => 'El mensaje no puede exceder los 1000 caracteres.', // Mensaje de error personalizado para el límite máximo de caracteres
		]);

		$contact = ContactsForm::create([
			'name'=>$request->name,
			'email'=>$request->email,
			'phone'=>$request->phone,
			'message'=>$request->message,
		]);

		Mail::to('operaciones@glppaqueteria.com')->send(new ContactFormMail($contact));

        return redirect()->back()->with('success', '¡Gracias! Nos pondremos en contacto.');
    }

}
