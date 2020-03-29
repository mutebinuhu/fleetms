<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//all users list api
//Route::get('myusers', 'AdminController@myusers');

Route::get('users-list', 'AdminController@usersList'); 
//all users list api

//all vehicles list api
Route::get('vehicles-list', 'AdminController@vehicleList');

//admin routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('admin/users/{id}', 'AdminController@singleUser');
Route::patch('admin/users/{id}', 'AdminController@update');
Route::post('/admin/storevehicle', 'AdminController@storeVehicle')->name('admin.storeVehicle');
Route::get('admin/vehicle/{id}', 'AdminController@singleVehicle');


Route::post('/admin/adduser', 'AdminController@addUser');

//driverscontroller
Route::get('carms/drivers', 'DriversController@index');

//users controllers
Route::resource('users', 'userscontroller');

//vehicles controllers
Route::resource('vehicles', 'vehiclescontroller');

//queries vehicles under repair



//vehicle allocation controller
Route::resource('vehicleallocation', 'vehicleallocationcontroller');

//requests
Route::get('requests/dashboard', 'requestscontroller@dashboard');
Route::resource('requests', 'requestscontroller');
Route::get('/download/{id}', 'requestscontroller@download');

Route::resource('transportofficer', 'transportofficercontroller');
Route::get('/transportofficer/printout/{id}/', 'transportofficercontroller@print');
Route::get('underrepair/', 'transportofficercontroller@underRepairVehicles');
/*queries*/
Route::get('queries/vehiclesunderrepair', 'queriesController@underRepairVehicles');
/*end queries*/

