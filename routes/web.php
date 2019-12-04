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

/////////////////////Data Motor///////////////////////////////////
Route::get('/adminDB', 'MotorController@index');
Route::post('store', 'MotorController@store');
// Route::post('update/{id}', 'MotorController@update');
Route::post('update/{id}', 'MotorController@update');
Route::get('delete/{id}', 'MotorController@destroy');
/////////////////////////Booking//////////////////////////////////
Route::post('sewa', 'BookingController@sewa');
Route::get('/admin', 'BookingController@create');
Route::get('/adminOnGoing', 'BookingController@index');
Route::post('return/{id}', 'BookingController@update');
Route::get('deleteBooking/{id}', 'BookingController@destroy');
// Route::post('confirmReq/{id}', 'BookingController@confirm');
////////////////////////Database////////////////////////////////////
Route::get('/historyDB', 'HistoryController@index');
Route::get('delhistory/{id}', 'HistoryController@destroy');
////////////////////////Notification////////////////////////////////////
Route::get('/notification', 'NotificationController@index');
Route::post('booking', 'NotificationController@booking');
Route::get('/', 'NotificationController@create');////////////index Home///////////////////
Route::get('deleteReq/{id}', 'NotificationController@destroy');
Route::get('deleteReqAll', 'NotificationController@destroyAll');
Route::post('confirmReq', 'NotificationController@confirm');
///////////////////////////////////////////////////////////////////////
Route::get('/userDB', 'UserDBController@index');

///////////////////////ADMIN & USER (Login / Register)///////////////////////////////////////////////
Auth::routes();
Route::get('/login','Auth\AdminLoginController@showLoginForm');
Route::get('/loginAdmin','Auth\AdminLoginController@showAdminLoginForm');

Route::get('/register','Auth\AdminLoginController@showRegisterPage');
Route::post('/AdminRegister','Auth\AdminLoginController@showAdminRegisterPage');

Route::post('admin-register', 'Auth\AdminLoginController@registerAdmin');
Route::post('user-register', 'Auth\AdminLoginController@registerUser');

Route::post('LOGIN', 'Auth\LoginController@login');
Route::post('LOGIN/Admin', 'Auth\AdminLoginController@loginAdmin');
Route::get('/logout', 'Auth\AdminLoginController@logout');
///////////////////////////////////////////////////////////////////////////////////////////////
//Route::get('/User', 'Auth\LoginController@User')->name('/User');////////////index User///////////////////
Route::get('/logouts', 'Auth\LoginController@logout');
Route::get('settingUser/{email}', 'Auth\LoginController@settingUser');
Route::get('HOME/{email}', 'Auth\LoginController@HOME');
Route::post('LOGIN/bookings', 'Auth\LoginController@bookings');
Route::get('deleteReqUser/{id}/{email}', 'Auth\LoginController@destroy');
