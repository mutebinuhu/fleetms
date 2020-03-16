<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reject extends Model
{
    //
    protected $fillable = ['created_by', 'repair_request_id', 'description'];
}
