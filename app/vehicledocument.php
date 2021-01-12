<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicledocument extends Model
{
    //
    protected $fillable = [
    	'vehicle_id', 'name',
    	'document_name',
    	'attachment',
    	'description'
    ];
}
