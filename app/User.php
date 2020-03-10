<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'sur_name', 'email', 'password', 'department', 'role', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //vehicle relationship
    public static function getvehicle($id)
    {
        $getvehicle = DB::select("SELECT * FROM `vehicleallocations` va INNER JOIN vehicles vh ON vh.id = va.vehicle_id WHERE driver_id = '$id'");
       
        return $getvehicle;
    }

    public static function getvehicledata()
    {
        $getdata = DB::table('vehicleallocations')
                    ->join('vehicles', 'vehicles.id', '=', 'vehicleallocations.vehicle_id')
                    ->select('vehicleallocations.*', 'vehicles.reg_no')
                    ->where('vehicleallocations.driver_id','=', Auth::id())
                    ->get();
        return $getdata;
    }
}
