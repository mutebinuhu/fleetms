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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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

//transportofficecontroller
Route::get('/transportofficer', 'transportofficercontroller@index');