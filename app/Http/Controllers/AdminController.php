<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    	return view('admin.index')
    			->withusers($users);
    }

    public function singleUser($id)
    {
    	$user = User::whereid($id)->firstOrFail();
    	return view('admin.user')
    			->withuser($user);
    }

    public function update($id, Request $request)
    {
    	$update = User::whereid($id)->firstOrFail();
    	
    	$request->validate([

    		'role' => 'required'
    	]);

    	$update->role = $request->get('role');
    	$update->save();
    	return redirect('/admin')->with('status', 'users role updated to  ' . $request->get('role'));

    }
}
