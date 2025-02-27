<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];

    public function status(){
         return $this->belongsTo(CustomerStatus::class);
    }

    public function shipments(){
    	 return $this->hasMany('App\Shipment');
    }
}
