<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\requestrepair;


class transportofficercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	//requests details
    	$requests = DB::table('repairrequests')
    					->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
    					->join('users','users.id','=','repairrequests.created_by')
    					->select('vehicles.reg_no', 'vehicles.type', 'repairrequests.id','repairrequests.description','repairrequests.status','users.first_name','users.sur_name','repairrequests.created_at')
                        ->where('repairrequests.status', '=',  0)
    					->latest()
    					->get();
                        
        //counting pending requests
        $pendingRequests = DB::table('repairrequests')
        					->where('status','=',0)
        					->get()
        					->count();
        //count rejected
        $countrejected = count(DB::table('repairrequests')->get()
                        ->where('status', 2));
        //count approved
        $countapproved = count(DB::table('repairrequests')->get()
                        ->where('status', 1));
        //rejected
        $rejected = DB::table('repairrequests')->get()
                        ->where('status', 2);
        //returns allocations
        $getdata = DB::table('vehicleallocations')
                    ->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
                    ->select('vehicleallocations.*', 'vehicles.reg_no', 'vehicles.make')
                    ->where('vehicleallocations.officer_id','=', Auth::id())
                    ->latest()
                    ->get();

        return view('transportofficer.index')
        		->withpendingRequests($pendingRequests)
        		->withrequests($requests)
                ->withcountrejected($countrejected)
                ->withcountapproved($countapproved)
                ->withrejected($rejected)
                ->withgetdata($getdata);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd('yah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function underRepairVehicles()
    {
        $underrepairvehicles = DB::table('vehicles')
                                ->get();
        return view('transportofficer.queries.underrepairvehicles')
                        ->withunderrepairvehicles($underrepairvehicles);
    }


}
