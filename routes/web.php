<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/logout",function(){
    Session::flush();
    return redirect("/");
});

Route::get("/login","App\Http\Controllers\patientController@loginAndSignUp");
Route::post("/login","App\Http\Controllers\patientController@login");
Route::post("/signup","App\Http\Controllers\patientController@signup");
Route::middleware(["patientLogin"])->group(function(){
    Route::get("/","App\Http\Controllers\patientController@index");
    Route::get("/appointment/request/{batchId}","App\Http\Controllers\patientController@reqAppointment");
    Route::post("/appointment/create/","App\Http\Controllers\patientController@postAppointment");
    Route::get("/appointment/detail/{appointmentId}","App\Http\Controllers\patientController@appointmentDetail");
});


Route::prefix("admin")->group(function(){
    Route::get("/login","App\Http\Controllers\adminController@login");
    Route::post("/login","App\Http\Controllers\adminController@postLogin");
    Route::post("/signup","App\Http\Controllers\adminController@postSignUp");
    
    Route::middleware(["adminLogin"])->group(function(){
        Route::get("/","App\Http\Controllers\adminController@index");
        Route::post("/addbatch","App\Http\Controllers\adminController@addBatch");
        Route::get("/appointments/{batchId}","App\Http\Controllers\adminController@viewAppointments");
        Route::get("/appointment/{appointmentId}","App\Http\Controllers\adminController@appointmentDetail");
        Route::post("/appointment/update","App\Http\Controllers\adminController@updateAppointmentStatus");
    });
    
});
