<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Support\Paginator;
use Auth;
use App\Vehicle;
use App\user;
use Illuminate\Http\Request;


class vehiclescontroller extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      

    public function index()
    {
        //
        $users = user::all();
        $countusers = count($users);
        
        $vehicles = DB::table('vehicles')
                    ->latest()
                    ->paginate(10);

        $assignedvehicles = DB::table('vehicleallocations')
                            ->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
                            ->join('users', 'users.id', '=', 'vehicleallocations.driver_id')
                            ->get();

        $unassignedvehicles =DB::table('vehicles')
                            ->leftjoin('vehicleallocations', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
                            ->where('vehicleallocations.officer_id', null)
                            ->select('vehicles.id', 'vehicles.reg_no', 'vehicles.type', 'vehicles.eng_no', 'status', 'vehicles.created_at', 'vehicles.updated_at')
                            ->latest()
                            ->get();
                            

        $countvehicles = count($vehicles);
        return view('vehicles.index')
                ->withusers($users)
                ->withvehicles($vehicles)
                ->withcountusers($countusers)
                ->withcountvehicles($countvehicles)
                ->withassignedvehicles($assignedvehicles)
                ->withunassignedvehicles($unassignedvehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehicles.create');
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
        $unique = uniqid();
        $user_id = Auth::id();
        $request->validate([
            'reg_no'=>['required', 'unique:vehicles'],
            'eng_no'=>'required',
            'make'=>'required',
            'type'=>'required',
            'mileage'=>'required',
            'year'=>['required', 'max:4'],
            'status'=>'required',
        ]);

        $formdata = array(

            'reg_no'=>strtoupper($request->reg_no),
            'eng_no'=>strtoupper($request->eng_no),
            'make'=>strtoupper($request->make),
            'type'=>strtoupper($request->type),
            'mileage'=>$request->mileage,
            'year'=>$request->year,
            'status'=>$request->status,
            'user_id'=>$user_id,
        );
        Vehicle::create($formdata);
        return redirect('vehicles/create')->with('status', 'vehicle successfully added');

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
        $singlevehicle = Vehicle::whereid($id)->firstorFail();
        return view('vehicles.show')
                ->withsinglevehicle($singlevehicle);
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
        $editvehicle = Vehicle::whereid($id)->firstorFail();
        return view('vehicles.edit')
                ->witheditvehicle($editvehicle);
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
        $request->validate([
            'reg_no'=>'required',
            'eng_no'=>'required',
            'make'=>'required',
            'type'=>'required',
            'mileage'=>'required',
            'year'=>'required',
            'status'=>'required',

        ]);

        $update = Vehicle::whereid($id)->firstorFail();
        $update->reg_no = $request->get('reg_no');
        $update->eng_no = $request->get('eng_no');
        $update->make = $request->get('make');
        $update->type = $request->get('type');
        $update->mileage = $request->get('mileage');
        $update->year = $request->get('year');
        $update->status = $request->get('status');


        $update->save();
        return redirect('/vehicles')->with('status', 'vehicle data updated');

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
        $id = Vehicle::whereid($id)->firstorFail();
        $id->delete();
        return redirect('/vehicles')->with('status', 'vehicle deleted');
    }
    
}
