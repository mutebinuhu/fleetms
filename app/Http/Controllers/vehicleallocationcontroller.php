<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vehicle;
use App\vehicleallocation;
use Auth;

class vehicleallocationcontroller extends Controller
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

        //returns all tos
        $allocatedvehicles = DB::table('vehicleallocations')
                    ->join('vehicles', 'vehicles.id','=','vehicleallocations.vehicle_id')
                    ->join('users', 'users.id', '=', 'vehicleallocations.officer_id')
                    ->get();
        //returns all vehicles
        $allocatedvehicless = DB::table('vehicleallocations')
                                    ->get();
        $countallocatedvehicles = count(DB::table('vehicleallocations')
                                    ->get());
        return view('vehicleallocation.index')
                    ->withallocatedvehicles($allocatedvehicles)
                    ->withcountallocatedvehicles($countallocatedvehicles);
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         //returns all tos
        $officers = DB::table('users')
                    ->where('role', '=', 'to')
                    ->get();
        //returns all vehicles
        $vehicles = DB::table('vehicles')
                    ->get();
        //returns all drivers
        $drivers = DB::table('users')
                    ->where('role', '=', 'driver')
                    ->get();
        
        return view('vehicleallocation.create')
                    ->withvehicles($vehicles)
                    ->withofficers($officers)
                    ->withdrivers($drivers);

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
        $user_id = Auth::id();
        $request->validate([
            'reg_no' => 'required',
            'officer' => 'required',
            'driver'=> 'required'
        ]);

        $formdata = array(
            'vehicle_id' => $request->reg_no,
            'officer_id' => $request->officer,
            'driver_id' => $request->driver,
            'created_by'=> $user_id,
            
        );
        vehicleallocation::create($formdata);
        return redirect('vehicleallocation/create')->with('status','vehicle allocated');
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
