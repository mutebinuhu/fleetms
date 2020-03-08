<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\vehicle;
use App\vehicleallocation;

class vehicleallocationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //returns all tos
        
        //returns all vehicles
        $allocatedvehicles = DB::table('vehicleallocations')
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
        $request->validate([
            'reg_no' => 'required',
            'officer' => 'required',
            'driver'=> 'required'
        ]);

        $formdata = array(
            'reg_no' => $request->reg_no,
            'officer' => $request->officer,
            'driver' => $request->driver,
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
