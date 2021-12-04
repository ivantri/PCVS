<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;

use App\Models\tb_user as User;
use App\Models\tb_admin as Admin;
use App\Models\tb_healthcare as HC;

use App\Models\tb_batch as Batch;
use App\Models\tb_vaccine as Vaccine;
use App\Models\tb_vaccination as Appointment;

class adminController extends Controller
{
    public function index(){
        $batches = Batch::where("healthcare_id",Session::get("healthcare_id"))->get();
        return view("admin.index",["batches"=>$batches,"vaccines"=>Vaccine::all()]);
    }
    public function login(){
        return view("admin.loginSignUp",["healthcares"=>HC::all()]);
    }
    public function postSignUp(Request $req){
        $data = $req->validate([
            "username"=>"required",
            "password"=>"required",
            "email"=>"required",
            "fullname"=>"required",
            "healthcare_id"=>"required"
        ]);
        $user = User::create([
            "username"=>$data["username"],
            "password"=>bcrypt($data["password"]),
            "email"=>$data["email"],
            "fullname"=>$data["fullname"],
            "role"=>"admin"
        ]);
        $admin = Admin::create([
            "staffid"=>rand(),
            "healthcare_id"=>$data["healthcare_id"],
            "user_id"=>$user->id
        ]);
        return redirect("/admin")->withSucces("Registration Success!");
    }

    public function postLogin(Request $req){
        $data = $req->validate([
            "username"=>"required",
            "password"=>"required"
        ]);
        $user = User::where("username",$data["username"])->whereOr("email",$data["username"])->where("role","admin")->first();
        if($user)
        if(Hash::check($data["password"], $user->password)){
            Session::put([
                "login_admin"=>true,
                "user_id"=>$user->id,
                "user_fullname"=>$user->fullname,
                "healthcare_id"=>$user->admin->healthcare->id
            ]);
            return redirect("/admin");
        }
        return redirect("/admin")->withErrors(["Username or Password is incorrect!"]);
    }

    public function addBatch(Request $req){
        $data = $req->validate([
            "vaccine_id"=>"required",
            "batchno"=>"required",
            "expirydate"=>"required",
            "quantityavailable"=>"required",
            "quantittadministered"=>"required",
        ]);
        $data["healthcare_id"]=Session::get("healthcare_id");
        $batch = Batch::create($data);
        if($batch)
        return redirect()->back()->withSuccess("Vaccine Batch successfully added!");
        else 
        return redirect()->back()->withErrors(["Task Failed!"]);
    }

    public function viewAppointments($batchId){
        $batch = Batch::where("id",$batchId)->first();
        if(!$batch) return redirect()->back()->withErrors(["Not found!"]);
        return view("admin.appointments",["batch"=>$batch]);
    }

    public function appointmentDetail($appointmentId){
        $appointment = Appointment::find($appointmentId);
        if(!$appointment) return redirect()->back()->withErrors(["Not found!"]);
        return view("admin.appointment",["appointment"=>$appointment]);
    }

    public function updateAppointmentStatus(Request $req){
        $data = $req->validate([
            "appointment_id"=>"required",
            "status"=>"required",
            "remarks"=>"required"
        ]);
        $appointment = Appointment::find($data["appointment_id"]);
        if(!$appointment) return redirect()->back()->withErrors(["Not found!"]);
        $appointment->status = $data["status"];
        $appointment->remarks = $data["remarks"];
        $appointment->save();

        if($data["status"]=="administered"){
            $batch = $appointment->batch;
            $batch->quantittadministered =  $batch->quantityadministered+1;
            $batch->save();
        }

        return redirect("/admin")->withSuccess("Update success!");
    }


}
