<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $guarded=[];

    public function status(){
         return $this->belongsTo(CollectorStatus::class);
    }
}
