<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $guarded=[];

    public function status(){
         return $this->belongsTo(ShipmentStatus::class);
    }

    public function remitent(){
         return $this->belongsTo(Remitent::class);
    }

    public function destinatary(){
         return $this->belongsTo(Destinatary::class);
    }

    public function history(){
        return $this->hasMany(ShipmentHistory::class);
    }

    public function packages(){
        return $this->hasMany(ShipmentPackages::class);
    }
}
