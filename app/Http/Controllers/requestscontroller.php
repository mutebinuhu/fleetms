<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use vehicle;
use App\repairrequest;
use vehicleallocation;
use reject;
use App\Notifications\RequestCreated;
use App\Notifications\ChangeStatusNotification;
use store;

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
                         ->where('user_id','=',Auth::id())
                         ->get()
                         ->count();

        //pending
         $pending = DB::table('repairrequests')
                         ->where('status', 0)
                         ->where('user_id','=',Auth::id())
                         ->get();
        //approved
        $approved = DB::table('repairrequests')
                         ->where('status', 1)
                         ->where('user_id','=',Auth::id())
                         ->get();
        //counting pending requests
        $countPending = count($pending);
        //counting approved                 
        $countApproved = DB::table('repairrequests')
                         ->where('status', 1)
                         ->where('user_id','=',Auth::id())
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
                            ->where('repairrequests.user_id','=',Auth::id())
                            ->latest()
                            ->paginate(2);
        //rejected requests
        $rejected = count(DB::table('repairrequests')
                    ->where('status',2)
                    ->where('user_id',  Auth::id())
                    ->get());
        //retrieving repairs list from repairsTable
        $repairs = DB::table('repairsList')
                    ->get();
        
        return view('requests.dashboard')
                ->withgetdata($getdata)
                ->withcountRequests($countRequests)
                ->withcountPending($countPending)
                ->withcountApproved($countApproved)
                ->withrequestHistory($requestHistory)
                ->withapproved($approved)
                ->withpending($pending)
                ->withrejected($rejected)
                ->withrepairs($repairs)
                ->withrejectedRequests($rejectedRequests);
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
                         ->where('user_id','=',Auth::id())
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
           'vehicle_id'=>'required',

        ]);
        $formdata = array(
            'description'=>$request->description,
            'vehicle_id'=>$request->vehicle_id,
            'user_id'=>$createdBy,
            'repair_name'=>$request->repair_name,
            'cost'=>3000
        );
        //mail request creater
     $email = repairrequest::create($formdata);
     $email->findOrFail($createdBy)->notify(new RequestCreated);

       /*  \Mail::to($email->user->email)->send(
            new requestCreated($email)
       );
       */

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
                    ->join('users','users.id','=','repairrequests.user_id')
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
                    ->join('users','users.id','=','repairrequests.user_id')
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
        /*check the status type and output the desired message */
        $check = ""; 
        switch ($update->status = $request->get('status')) {
            case 1:
                $check =  "Repair request approved";
                break;
            case 2:
                $check =  "Repair request rejected";
                break;
            case 3:
                $check =  "Repair request kept InView";
                break;
            case 5:
                $check = "MoWt Form Uploaded";
            default:
                break;
            return $check;
        }
        return redirect('/transportofficer')->with('status', $check);

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
    //downloads the request form
    public function download($id)
    {
            $download =DB::table('repairrequests')
                    ->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
                    ->join('users','users.id','=','repairrequests.user_id')
                    ->where('repairrequests.id','=',$id)
                    ->select('vehicles.reg_no', 'vehicles.make', 'vehicles.type', 'vehicles.mileage', 'vehicles.eng_no', 'vehicles.year', 'repairrequests.*', 'users.sur_name','users.first_name')
                    ->get();

        return view('requests.printout')
                    ->withdownload($download);
    }

    //Approved()/Pending MoWT
    public function pendinglporequests()
    {
                $pendingLporequests = DB::table('repairrequests')
                        ->join('vehicles','vehicles.id','=','repairrequests.vehicle_id')
                        ->join('users','users.id','=','repairrequests.user_id')
                        ->select('vehicles.reg_no', 'vehicles.type', 'repairrequests.id','repairrequests.description','repairrequests.status','users.first_name','users.sur_name','repairrequests.created_at')
                        ->where('repairrequests.status', '=',  1)
                        ->latest()
                        ->get();
        return view('transportofficer.index')
                    ->withpendingLpoRequests($pendingLporequests);
    }

   
  
}
