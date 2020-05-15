<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repairrequest extends Model
{
    //
    protected $fillable = ['description', 'vehicle_id', 'user_id','status', 'created_by', 'reason', 'status_by', 'repair_name', 'cost'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	  
  
}
