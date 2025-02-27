<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipment;
use App\Destinatary;
use App\CustomerClients;
use PDF;
use QrCode;
use BarCode; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DashboardCustomerController extends Controller
{

    public function getCustumers(Request $request){
        if(!$request->ajax()) return redirect('/');
        $buscar   = $request->buscar;
        $user     = $request->user();
        $user_id  = $user->id;
        $customer = Customer::where('user_id',$user_id)->firstOrFail();
        if($buscar==''){
            //$categorias = Categoria::orderBy('id','desc')->paginate(3);
            $shipments = Shipment::where('customer_id', $customer->id)
                        ->orderBy('created_at','desc')
                        ->with('status')
                        ->with('remitent')
                        ->with('destinatary')
                        ->paginate(5);
        }else{
            $shipments = Shipment::with('status')
                        ->with('remitent')
                        ->with('destinatary')
                        ->where('customer_id', $customer->id)
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
                        ->paginate(5);
        }
        return [
            'pagination'=>[
                'total'=> $shipments->total(),
                'current_page'=> $shipments->currentPage(),
                'per_page'=> $shipments->perPage(),
                'last_page'=> $shipments->lastPage(),
                'from'=> $shipments->firstItem(),
                'to'=> $shipments->lastItem(),
            ],
            'shipments'=>$shipments
        ];
        //return $shipments;
    }

    public function index(Request $request){
        $user     = $request->user();
        //dd($user);
        $user_id  = $user->id;
        //dd($user_id);
        $customer = Customer::where('user_id',$user_id)->firstOrFail();
        //$customer = Customer::all();
        //dd($customer);

    	$shipments = Shipment::where('customer_id', $customer->id)->orderBy('created_at','desc')->paginate(10);
        return view('customer.index',[
            'customer'=>$customer,
            'shipments'=>$shipments,
        ]);
    }

    public function createShipment(Request $request){
        $customer=null;
        $destinatary=null;

        $destinatary_id = Session::has('destinatary')? Session::get('destinatary'):0;
        $remitent       = Session::has('remitent')? Session::get('remitent'):0;

        if($destinatary_id){
            $destinatary = Destinatary::where('id',$destinatary_id)->firstOrFail();
        }

        if($remitent){
            $customer= Customer::where('user_id', $request->user()->id )->firstOrFail();
        }

        return view('customer.shipment_create',[
            'customer'=>$customer,
            'destinatary'=>$destinatary,
        ]);
    }

    public function customerContactInformation(Request $request){
    	$user = $request->user();
    	$user_id = $user->id;
        $customer= Customer::where('user_id',$user_id)->firstOrFail();
        return view('customer.customer_contact_information',[
            'customer'=>$customer,
        ]);
    }

    public function printShipment($shipment_id){
        $shipment = Shipment::find($shipment_id);
        $barcode = [
                'text' => $shipment->tracking_number,
                'size' => 65,
                'orientation' => 'horizontal',
                'code_type' => 'code39',
                'print' => true,
                'sizefactor' => 1,
                'filename' => 'image1.jpeg'
            ];

            
        $barcontent = BarCode::barcodeFactory()->renderBarcode(
                                    $text=$barcode["text"],
                                    $size=$barcode['size'],
                                    $orientation=$barcode['orientation'],
                                    $code_type=$barcode['code_type'], // code_type : code128,code39,code128b,code128a,code25,codabar
                                    $print=$barcode['print'],
                                    $sizefactor=$barcode['sizefactor'],
                                    $filename = $barcode['filename']
            )->filename($barcode['filename']);

        $base = url('/');
        $token = str_random(32);
        $url = $base."/collector/trk/".$shipment->tracking_number;
        $codigoQR = QrCode::format('png')->size(150)->generate($url);

        $pdf = PDF::loadView('customer.print_shipment_pdf', ['url'=>$url,'code_qr'=>$codigoQR,'shipment'=>$shipment,'barcontent'=>$barcontent])->setPaper('a4');

        return $pdf->download($shipment->tracking_number.'.pdf');
    }

    public function printShipmentNew($shipment_id){
        $shipment = Shipment::find($shipment_id);
        $barcode = [
                'text' => $shipment->tracking_number,
                'size' => 65,
                'orientation' => 'horizontal',
                'code_type' => 'code39',
                'print' => true,
                'sizefactor' => 1,
                'filename' => 'image1.jpeg'
            ];
            $barcontent = BarCode::barcodeFactory()->renderBarcode(
                                    $text=$barcode["text"],
                                    $size=$barcode['size'],
                                    $orientation=$barcode['orientation'],
                                    $code_type=$barcode['code_type'], // code_type : code128,code39,code128b,code128a,code25,codabar
                                    $print=$barcode['print'],
                                    $sizefactor=$barcode['sizefactor'],
                                    $filename = $barcode['filename']
            )->filename($barcode['filename']);

        $base = url('/');
        //$token = str_random(32);
        $token = Str::random(32);
        $url = $base."/collector/trk/".$shipment->tracking_number;
        $codigoQR = QrCode::format('png')->size(150)->generate($url);

        $pdf = PDF::loadView('customer.print_shipment_pdf_new', ['url'=>$url,'code_qr'=>$codigoQR,'shipment'=>$shipment,'barcontent'=>$barcontent])->setPaper('a4');

        return $pdf->download($shipment->tracking_number.'.pdf');
    }

    public function printShipmentNewAlt($shipment_id){
        $shipment = Shipment::find($shipment_id);
        $barcode = [
                'text' => $shipment->tracking_number,
                'size' => 65,
                'orientation' => 'horizontal',
                'code_type' => 'code39',
                'print' => true,
                'sizefactor' => 1,
                'filename' => 'image1.jpeg'
            ];
            $barcontent = BarCode::barcodeFactory()->renderBarcode(
                                    $text=$barcode["text"],
                                    $size=$barcode['size'],
                                    $orientation=$barcode['orientation'],
                                    $code_type=$barcode['code_type'], // code_type : code128,code39,code128b,code128a,code25,codabar
                                    $print=$barcode['print'],
                                    $sizefactor=$barcode['sizefactor'],
                                    $filename = $barcode['filename']
            )->filename($barcode['filename']);

        $base = url('/');
        $token = str_random(32);
        $url = $base."/collector/trk/".$shipment->tracking_number;
        $codigoQR = QrCode::format('png')->size(150)->generate($url);

        //10 cm = 10/2.54*72 = 283.464566929
        //15 cm = 15/2.54*72 = 425.196850394
        //20 cm = 20/2.54*72 = 566.929133858
        $customPaper = array(0,0,567.00,385.00);
        $pdf = PDF::loadView('customer.print_shipment_pdf_new', ['url'=>$url,'code_qr'=>$codigoQR,'shipment'=>$shipment,'barcontent'=>$barcontent])->setPaper($customPaper, 'portrait');

        return $pdf->download($shipment->tracking_number.'.pdf');
    }

    public function detailShipment($shipment_id){


        $shipment = Shipment::find($shipment_id);
        //dd($shipment->packages);
        return view('customer.shipment_detail',[
            'shipment'=>$shipment,
        ]);
    }

    public function destinationDirectory(Request $request){
        return view('customer.destination_directory');
    }

    public function customersClients(Request $request){

        return view('customer.customers_clients');
    }

    public function getClients(Request $request){
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;

        if($buscar==''){
            $clients=CustomerClients::orderBy('id','desc')->paginate(20);
        }else{
            $clients = CustomerClients::where('mail', 'like', '%'.$buscar.'%')
                                ->orWhere('company', 'like', '%'.$buscar.'%')
                                ->orWhere('name', 'like', '%'.$buscar.'%')
                                ->orWhere('phone', 'like', '%'.$buscar.'%')
                                ->orWhere('movil', 'like', '%'.$buscar.'%')
                                ->orWhere('zip_code', 'like', '%'.$buscar.'%')
                                ->orWhere('address', 'like', '%'.$buscar.'%')
                                ->orWhere('number_out', 'like', '%'.$buscar.'%')
                                ->orWhere('district', 'like', '%'.$buscar.'%')
                                ->orWhere('city', 'like', '%'.$buscar.'%')
                                ->orWhere('state', 'like', '%'.$buscar.'%')
                                ->orderBy('id','desc')
                                ->paginate(20);
        }
        return [
            'pagination'=>[
                'total'=> $clients->total(),
                'current_page'=> $clients->currentPage(),
                'per_page'=> $clients->perPage(),
                'last_page'=> $clients->lastPage(),
                'from'=> $clients->firstItem(),
                'to'=> $clients->lastItem(),
            ],
            'clients'=>$clients
        ];
    }//getClients()

    public function getDestinationDirectory(Request $request){
        if(!$request->ajax()) return redirect('/');
        //$user = $request->user();
        //$user_id = $user->id;
        $buscar = $request->buscar;
        //$criterio = $request->criterio;

        if($buscar==''){
            //$articulo = Articulo::orderBy('id','desc')->paginate(3);
            $destinataries=Destinatary::orderBy('id','desc')->paginate(20);
        }else{
            $destinataries = Destinatary::where('mail', 'like', '%'.$buscar.'%')
                                ->orWhere('company', 'like', '%'.$buscar.'%')
                                ->orWhere('name', 'like', '%'.$buscar.'%')
                                ->orWhere('phone', 'like', '%'.$buscar.'%')
                                ->orWhere('movil', 'like', '%'.$buscar.'%')
                                ->orWhere('zip_code', 'like', '%'.$buscar.'%')
                                ->orWhere('address', 'like', '%'.$buscar.'%')
                                ->orWhere('number_out', 'like', '%'.$buscar.'%')
                                ->orWhere('district', 'like', '%'.$buscar.'%')
                                ->orWhere('city', 'like', '%'.$buscar.'%')
                                ->orWhere('state', 'like', '%'.$buscar.'%')
                                ->orderBy('id','desc')
                                ->paginate(20);
        }
        return [
            'pagination'=>[
                'total'=> $destinataries->total(),
                'current_page'=> $destinataries->currentPage(),
                'per_page'=> $destinataries->perPage(),
                'last_page'=> $destinataries->lastPage(),
                'from'=> $destinataries->firstItem(),
                'to'=> $destinataries->lastItem(),
            ],
            'destinataries'=>$destinataries
        ];
    }//getDestinationDirectory

    public function storeClient(Request $request){
        if(!$request->ajax()) return redirect('/');
        $user     = $request->user();
        $user_id  = $user->id;
        $customer = Customer::where('user_id',$user_id)->firstOrFail();

        CustomerClients::create([
            'customer_id'=> $customer->id,
            'mail'=> $request->mail,
            'company'=> $request->company,
            'name'=> $request->name,
            'last_name'=> $request->last_name,
            'second_last_name'=> $request->second_last_name,
            'rfc'=> $request->rfc,
            'department'=> $request->department,
            'phone'=> $request->phone,
            'movil'=> $request->movil,
            'zip_code'=> $request->zip_code,
            'address'=> $request->address,
            'number_out'=> $request->number_out,
            'number_int'=> $request->number_int,
            'district'=> $request->district,
            'city'=> $request->city,
            'state'=> $request->state,
            'reference'=> $request->reference,
            'detail'=> $request->detail,
            'observations'=> $request->observations,
        ]);

    }//storeClient

    public function updateClient(Request $request){
        if(!$request->ajax()) return redirect('/');

        $customer_client =  CustomerClients::find($request->client_id);

        $customer_client->mail=  $request->mail;
        $customer_client->company=  $request->company;
        $customer_client->name=  $request->name;
        $customer_client->last_name=  $request->last_name;
        $customer_client->second_last_name=  $request->second_last_name;
        $customer_client->rfc=  $request->rfc;
        $customer_client->department=  $request->department;
        $customer_client->phone=  $request->phone;
        $customer_client->movil=  $request->movil;
        $customer_client->zip_code=  $request->zip_code;
        $customer_client->address=  $request->address;
        $customer_client->number_out=  $request->number_out;
        $customer_client->number_int=  $request->number_int;
        $customer_client->district=  $request->district;
        $customer_client->city=  $request->city;
        $customer_client->state=  $request->state;
        $customer_client->reference=  $request->reference;
        $customer_client->detail=  $request->detail;
        $customer_client->observations=  $request->observations;
        $customer_client->save();


    }//updateClient


    public function searchShipments(Request $request){
        dd($request);
    }


    public function getMeRemitent(Request $request){
        if(!$request->ajax()) return redirect('/');
        $user     = $request->user();
        $user_id  = $user->id;
        $customer = Customer::where('user_id',$user_id)->firstOrFail();
        return $customer;
    }

    public function getDestinos(Request $request){
        if(!$request->ajax()) return redirect('/');
        $buscar   = $request->buscar;
        $criterio   = $request->criterio;
        if($buscar==''){
            //$categorias = Categoria::orderBy('id','desc')->paginate(3);
            $destinos = Destinatary::orderBy('id','desc')->paginate(5);
        }else{
            $destinos = Destinatary::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        return [
            'pagination'=>[
                'total'=> $destinos->total(),
                'current_page'=> $destinos->currentPage(),
                'per_page'=> $destinos->perPage(),
                'last_page'=> $destinos->lastPage(),
                'from'=> $destinos->firstItem(),
                'to'=> $destinos->lastItem(),
            ],
            'destinos'=>$destinos
        ];
    }//getDestinos

    public function getClientes(Request $request){
        if(!$request->ajax()) return redirect('/');
        $buscar   = $request->buscar;
        $criterio   = $request->criterio;

        $user     = $request->user();
        $user_id  = $user->id;
        $customer = Customer::where('user_id',$user_id)->firstOrFail();

        if($buscar==''){
            //$categorias = Categoria::orderBy('id','desc')->paginate(3);
            $clients = CustomerClients::where('customer_id',$customer->id)
                                        ->orderBy('id','desc')
                                        ->paginate(5);
        }else{
            $clients = CustomerClients::where('customer_id',$customer->id)
                                        ->where($criterio, 'like', '%'. $buscar . '%')
                                        ->orderBy('id', 'desc')
                                        ->paginate(5);
        }
        return [
            'pagination'=>[
                'total'=> $clients->total(),
                'current_page'=> $clients->currentPage(),
                'per_page'=> $clients->perPage(),
                'last_page'=> $clients->lastPage(),
                'from'=> $clients->firstItem(),
                'to'=> $clients->lastItem(),
            ],
            'clients'=>$clients
        ];
    }//getClientes


}
