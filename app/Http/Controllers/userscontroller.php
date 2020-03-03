<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\user;
use App\vehicle;
use Hash;


class userscontroller extends Controller
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
        //returns users list
        $users = user::all();
        return view('users.index')
                    ->withusers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //adds user
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //stores new user
        //default password
        $password = Hash::make(12345);
        $request->validate([

             'first_name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'department' => ['required'],

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
        return redirect('/users/create')->with('status', 'user registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //show single user
        $singleuser = user::whereid($user)->firstorFail();
        return view('users.show')
                ->withsingleuser($singleuser);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //edit user
        $edituser = user::whereid($user)->firstorFail();
        return view('users.edit')
                ->withedituser($edituser);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
             'first_name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
            'department' => ['required'],
        ]);
        $update = user::whereid($id)->firstorFail();
        $update->first_name = $request->get('first_name');
        $update->sur_name = $request->get('sur_name');
        $update->email = $request->get('email');
        $update->role = $request->get('role');
        $update->department = $request->get('department');
        $update->save();
        return redirect('/users')->with('status', 'user updated');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = user::whereid($id)->firstorFail();
        $user->delete();
        return redirect('/users')->with('status', 'user deleted');
    
        
    }
}
