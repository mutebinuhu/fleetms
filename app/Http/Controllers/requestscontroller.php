<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use vehicle;
use App\repairrequest;
use vehicleallocation;
use reject;



class requestscontroller extends Controller
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
        //loops test

        //counting requests
        $countRequests = DB::table('repairrequests')
                         ->where('created_by','=',Auth::id())
                         ->get()
                         ->count();
        //pending
         $pending = DB::table('repairrequests')
                         ->where('status', 0)
                         ->where('created_by','=',Auth::id())
                         ->get();
        //approved
        $approved = DB::table('repairrequests')
                         ->where('status', 1)
                         ->where('created_by','=',Auth::id())
                         ->get();
        //counting pending requests
        $countPending = count($pending);
        //counting approved                 
        $countApproved = DB::table('repairrequests')
                         ->where('status', 1)
                         ->where('created_by','=',Auth::id())
                         ->get()
                         ->count();

        //returns allocations
        $getdata = DB::table('vehicleallocations')
                    ->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
                    ->select('vehicleallocations.*', 'vehicles.reg_no', 'vehicles.make')
                    ->where('vehicleallocations.driver_id','=', Auth::id())
                    ->latest()
                    ->get();
        //  requests history
        $requestHistory= DB::table('repairrequests')
                            ->join('vehicles', 'vehicles.id','=','repairrequests.vehicle_id')
                            ->select('vehicles.reg_no','repairrequests.*')
                            ->where('repairrequests.created_by','=',Auth::id())
                            ->latest()
                            ->get();
        //rejected requests
        $rejected = count(DB::table('repairrequests')
                    ->where('status',2)
                    ->where('created_by',  Auth::id())
                    ->get());
        
        return view('requests.dashboard')
                ->withgetdata($getdata)
                ->withcountRequests($countRequests)
                ->withcountPending($countPending)
                ->withcountApproved($countApproved)
                ->withrequestHistory($requestHistory)
                ->withapproved($approved)
                ->withpending($pending)
                ->withrejected($rejected);
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
                    ->select('vehicleallocations.*', 'vehicles.reg_no', 'vehicles.type','vehicles.id')
                    ->where('vehicleallocations.driver_id','=', Auth::id())
                    ->get();
        //count request
        $countRequests = DB::table('repairrequests')
                         ->where('created_by','=',Auth::id())
                         ->get()
                         ->count();
        return view('requests.create')
                ->withgetdata($getdata)
                ->withcountRequests($countRequests);
    }

    public function store(Request $request)
    {
        //
        $createdBy=Auth::id();
        $request->validate([

           'description'=>'required',
           'vehicle_id'=>'required'

        ]);
        $formdata = array(
            'description'=>$request->description,
            'vehicle_id'=>$request->vehicle_id,
            'created_by'=>$createdBy      
        );

        repairrequest::create($formdata);
        return redirect('/requests/dashboard')
                ->with('status', 'request sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             /* $print =DB::table('repairrequests')
                    ->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
                    ->join('users','users.id','=','repairrequests.created_by')
                    ->where('repairrequests.id','=',$id)
                    ->select('vehicles.reg_no', 'vehicles.make', 'vehicles.type', 'vehicles.mileage', 'repairrequests.*', 'users.sur_name','users.first_name')
                    ->get();
                    */
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
        $show =DB::table('repairrequests')
                    ->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
                    ->join('users','users.id','=','repairrequests.created_by')
                    ->where('repairrequests.id','=',$id)
                    ->select('vehicles.reg_no', 'vehicles.make', 'vehicles.type', 'vehicles.mileage', 'repairrequests.*', 'users.sur_name','users.first_name')
                    ->get();


        return view('requests.edit')
                    ->withshow($show);
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
        $update = repairrequest::whereid($id)->firstorFail();
        $update->status = $request->get('status');
        $update->status_by=$request->get('status_by');
        $update->reason =$request->get('reason');

        $update->save();
        return redirect('/transportofficer')->with('status', 'Repair request approved');

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

    public function download($id)
    {
            $download =DB::table('repairrequests')
                    ->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
                    ->join('users','users.id','=','repairrequests.created_by')
                    ->where('repairrequests.id','=',$id)
                    ->select('vehicles.reg_no', 'vehicles.make', 'vehicles.type', 'vehicles.mileage', 'vehicles.eng_no', 'vehicles.year', 'repairrequests.*', 'users.sur_name','users.first_name')
                    ->get();

        return view('requests.printout')
                    ->withdownload($download);
    }
}
