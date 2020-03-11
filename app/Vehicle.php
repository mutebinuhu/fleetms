<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = ['reg_no', 'type', 'eng_no', 'make', 'mileage', 'year', 'created_by', 'updated_by', 'user_id'];

    public function requests()
    {
    	return $this->hasMany(repairrequest::class);
    }

}
