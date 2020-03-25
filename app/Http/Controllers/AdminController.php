<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Support\Paginator;
use App\User;
use App\vehicle;
use Hash;
use Redirect,Config;
use Datatables;
class AdminController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


    	$users = DB::table('users')
                    ->latest()
                    ->paginate(5);
        $countusers = count(user::all());

    /*-----------------------------------------*/    
    	$vehicles = DB::table('vehicles')
                        ->latest()
                        ->paginate(5);
    	$countvehicles = count($vehicles);
    	return view('admin.index')
    			->withusers($users)
    			->withvehicles($vehicles)
    			->withcountusers($countusers)
    			->withcountvehicles($countvehicles);

    }

    public function singleUser($id)
    {
    	$user = User::whereid($id)->firstOrFail();
    	return view('admin.user')
    			->withuser($user);
    }
	//updates department/role
    public function update($id, Request $request)
    {
    	$update = User::whereid($id)->firstOrFail();
    	
    	$request->validate([

    		'role' => 'required',
    		'department' => 'required',

    	]);

    	$update->role = $request->get('role');
    	$update->department = $request->get('department');
    	$update->save();
    	return redirect('/admin')->with('status', 'users role updated to  ' . $request->get('role'));

    }

    public function storeVehicle(Request $request)
    {
    	$user_id = Auth::id();
    	$created_by = Auth::user()->email;
    	$request->validate([
    		'reg_no' => ['required', 'unique:vehicle'],
    		'type' => 'required',
    		'eng_no' => 'required',
    		'make' => 'required',
    		'mileage' => 'required',
    		'year' => 'required',


    	]);

    	$form_data = array(

    		'reg_no' => $request->reg_no,
    		'type' => $request->type,
    		'eng_no' => $request->eng_no,
    		'make' => $request->make,
    		'mileage' => $request->mileage,
    		'year' => $request->year,
    		'created_by' => $created_by,
            'updated_by' => $updated_by,
    		'user_id'=>$user_id,
    	);

    	vehicle::create($form_data);
    	return redirect('/admin')->with('status', 'vehicle added');
    }
    //single vehicle
    public function singleVehicle($id)
    {
    	$vehicle = vehicle::whereid($id)->firstOrFail();
    	return view('admin.vehicle')
    			->withvehicle($vehicle);
    }
    //add user
     public function addUser(Request $request)

    {
    	//default password
    	$password = Hash::make(12345);
    	$request->validate([

    		 'first_name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
            'department' => 'required',

    	]);

    	$userdata = array(
    		'first_name' => $request->first_name,
    		'sur_name' => $request->sur_name,
    		'email' => $request->email,
    		'role' => $request->role,
    		'department' => $request->department,
    		'password'=> $password

    	);

    	user::create($userdata);
    	return redirect('/admin')->with('status', 'user registered');

    }

    //shos starts on the admin side on all pages
    public function adminlayouts()
    {
        $users = User::all();
        $countusers = count($users);
        $vehicles = vehicle::all();
        $countvehicles = count($vehicles);
        return view('layouts.application')
                ->withusers($users)
                ->withvehicles($vehicles)
                ->withcountusers($countusers)
                ->withcountvehicles($countvehicles);

    }
    // the functions below searches through the users list on the admin dashboard

    public function myusers()
    {
        return view('users');
    }
    public function usersList()
    {
        $users = DB::table('users')->select('*')->orderBy('id', 'desc');
        return datatables()->of($users)
            ->make(true);
        
    }
    //searches through the users list on the admin dashboard

    public function vehicleList()
    {
        $vehicles = DB::table('vehicles')->select('*')->orderBy('id', 'desc');
        return datatables()->of($vehicles)
            ->make(true);
    }
}
