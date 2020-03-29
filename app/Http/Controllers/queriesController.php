<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\vehicleallocation;

class queriesController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }


}
