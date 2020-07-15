<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Support\Paginator;

class Vehicle extends Model
{
    //
    protected $fillable = ['reg_no', 'type', 'eng_no', 'make', 'mileage', 'year', 'created_by', 'updated_by', 'user_id', 'status'];

    public function requests()
    {
    	return $this->hasMany(repairrequest::class)->latest();
    }

    public function document()
    {
    	return $this->hasMany(VehicleDocument::class);
    }


}
