<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\vehicle;

class AdminController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$users = User::all();
    	$countusers = count($users);
    	$vehicles = vehicle::all();
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
    	$url = uniqid();
    	$created_by = Auth::user()->email;
    	$request->validate([
    		'reg_no' => 'required',
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
    		'user_id'=>$user_id,
    		'url' => $url
    	);

    	vehicle::create($form_data);
    	return redirect('/admin')->with('status', 'vehicle added');
    }
    //single vehicle
    public function singleVehicle($url)
    {
    	$vehicle = vehicle::whereurl($url)->firstOrFail();
    	return view('admin.vehicle')
    			->withvehicle($vehicle);
    }
}
