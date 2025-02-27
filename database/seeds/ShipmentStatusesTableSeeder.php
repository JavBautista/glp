<?php

use Illuminate\Database\Seeder;
use App\ShipmentStatus;

class ShipmentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'creada';
        $shipment_status->save();
        
        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'recolectada';
        $shipment_status->save();
        
        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'embarcada';
        $shipment_status->save();
        
        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'ruta';
        $shipment_status->save();

        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'lista para entrega';
        $shipment_status->save();

        $shipment_status = new ShipmentStatus();
        $shipment_status->status = 'entregada';
        $shipment_status->save();

    }
}
