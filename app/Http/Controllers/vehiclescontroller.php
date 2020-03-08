<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Support\Paginator;
use Auth;
use App\vehicle;
use App\user;
use Illuminate\Http\Request;


class vehiclescontroller extends Controller
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
        //
        $users = user::all();
        $countusers = count($users);
        $vehicles = DB::table('vehicles')
                    ->latest()
                    ->paginate(5);

        $countvehicles = count($vehicles);
        return view('vehicles.index')
                ->withusers($users)
                ->withvehicles($vehicles)
                ->withcountusers($countusers)
                ->withcountvehicles($countvehicles);
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
        $url = uniqid();
        $user_id = Auth::id();
        $request->validate([
            'reg_no'=>'required',
            'eng_no'=>'required',
            'make'=>'required',
            'type'=>'required',
            'mileage'=>'required',
            'year'=>'required'
        ]);

        $formdata = array(

            'reg_no'=>$request->reg_no,
            'eng_no'=>$request->eng_no,
            'make'=>$request->make,
            'type'=>$request->type,
            'mileage'=>$request->mileage,
            'year'=>$request->year,
            'user_id'=>$user_id,
            'url'=>$url

        );
        vehicle::create($formdata);
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
        $singlevehicle = vehicle::whereid($id)->firstorFail();
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
        $editvehicle = vehicle::whereid($id)->firstorFail();
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
            'year'=>'required'
        ]);

        $update = vehicle::whereid($id)->firstorFail();
        $update->reg_no = $request->get('reg_no');
        $update->eng_no = $request->get('eng_no');
        $update->make = $request->get('make');
        $update->type = $request->get('type');
        $update->mileage = $request->get('mileage');
        $update->year = $request->get('year');

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
        $id = vehicle::whereid($id)->firstorFail();
        $id->delete();
        return redirect('/vehicles')->with('status', 'vehicle deleted');
    }
}
