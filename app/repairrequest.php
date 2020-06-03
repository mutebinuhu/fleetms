<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class repairrequest extends Model
{
    //
    use Notifiable;
    protected $fillable = ['description', 'vehicle_id', 'user_id','status', 'created_by', 'reason', 'status_by', 'repair_name', 'cost', 'mowt_verification_form'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function documents()
	{
		return $this->hasMany(Document::class);
	}
	  
  
}
