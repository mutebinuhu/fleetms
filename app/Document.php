<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = ['user_id', 'repairrequest_id', 'file_name', 'file'];
}
