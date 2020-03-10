<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleallocation extends Model
{
    //
    protected $fillable = ['vehicle_id', 'officer_id', 'driver_id', 'created_by', 'updated_by'];

    public function vehicleallocation()
    {
    	return $this->hasMany(vehicle::class);
    }

}
