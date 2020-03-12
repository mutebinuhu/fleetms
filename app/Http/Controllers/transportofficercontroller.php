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
    public function index()
    {
    	//requests details
    	$requests = DB::table('repairrequests')
    					->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
    					->join('users','users.id','=','repairrequests.created_by')
    					->select('vehicles.reg_no','repairrequests.id','repairrequests.description','repairrequests.status','users.first_name','users.sur_name','repairrequests.created_at')
    					->latest()
    					->get();
        //counting pending requests
        $pendingRequests = DB::table('repairrequests')
        					->where('status','=','pending')
        					->get()
        					->count();
        return view('transportofficer.index')
        		->withpendingRequests($pendingRequests)
        		->withrequests($requests);
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
}
