<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repairrequest extends Model
{
    //
    protected $fillable = ['description', 'vehicle_id', 'created_by' ];
}
