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

Route::get('/test', 'testcontroller@index');
Auth::routes();

//admin routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');


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


//vehicle allocation controller
Route::resource('vehicleallocation', 'vehicleallocationcontroller');

//requests
Route::get('requests/dashboard', 'requestscontroller@dashboard');
Route::resource('requests', 'requestscontroller');

Route::resource('transportofficer', 'transportofficercontroller');
Route::get('/transportofficer/printout/{id}/', 'transportofficercontroller@print');

//bread crumps

//rejects controller
Route::resource('rejects', 'rejectscontroller');
