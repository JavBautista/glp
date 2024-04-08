<?php

namespace App\Exports;

use App\Shipment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ShipmentsExport implements FromView
{
    private $fecha_ini, $fecha_fin;

    function __construct($f1,$f2) {
        $this->fecha_ini = $f1;
        $this->fecha_fin = $f2;
    }

    public function view(): View
    {
        $f1=$this->fecha_ini;
        $f2=$this->fecha_fin;
        $shipments = Shipment::with('history')
                            ->with('packages')
                            ->whereBetween('created_at', [$f1,$f2])
                            ->get();

        $num_max_packages=0;
        foreach($shipments as $ship){
            $_tmp=0;
            if(isset($ship->packages))
                $_tmp=$ship->packages->count();
            if($_tmp>$num_max_packages) $num_max_packages=$_tmp;
        }

        return view('admin.shipments.shipments_export', [
            'shipments' => $shipments,
            'num_max_packages' => $num_max_packages
        ]);
    }
}