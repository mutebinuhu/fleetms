<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class driverscontroller extends Controller
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
    
    public function dashboard()
    {
    	$getdata = DB::table('vehicleallocations')
    				->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
    				->select('vehicleallocations.*', 'vehicles.reg_no', 'vehicles.make')
    				->where('vehicleallocations.driver_id','=', Auth::id())
    				->latest()
    				->get();
    	return view('drivers.dashboard')
    			->withgetdata($getdata);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$getdata = DB::table('vehicleallocations')
    				->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
    				->select('vehicleallocations.*', 'vehicles.reg_no', 'vehicles.make')
    				->where('vehicleallocations.driver_id','=', Auth::id())
    				->latest()
    				->get();
    	return view('drivers.create')
    			->withgetdata($getdata);
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
