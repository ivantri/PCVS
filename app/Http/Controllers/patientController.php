<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_user as User;
use App\Models\tb_patient as Patient;

use App\Models\tb_healthcare as HC;
use App\Models\tb_vaccination as Appointment;
use App\Models\tb_batch as Batch;

use Hash;
use Session;
class patientController extends Controller 
{
    public function index(Request $req){
        return view("index",[
            "healthcares"=>HC::get(),
            "appointments"=>Appointment::where("patient_id",Session::get("patient_id"))->get()]);
    }

    public function loginAndSignUp(){
        return view("loginSignUp");
    }
    public function signUp(Request $req){
        $data = $req->validate([
            "username"=>"required",
            "password"=>"required",
            "email"=>"required",
            "fullname"=>"required",
            "icpassport"=>"required",
        ]);
        $user = User::create([
            "username"=>$data["username"],
            "password"=>bcrypt($data["password"]),
            "email"=>$data["email"],
            "fullname"=>$data["fullname"],
            "role"=>"patient"
        ]);
        $patient = Patient::create([
            "icpassport"=>$data["icpassport"],
            "user_id"=>$user->id
        ]);
        return redirect("/")->withSucces("Registration Success!");
    }
    public function login(Request $req){
        $data = $req->validate([
            "username"=>"required",
            "password"=>"required"
        ]);
        $user = User::where("username",$data["username"])->whereOr("email",$data["username"])->where("role","patient")->first();
        if($user)
        if(Hash::check($data["password"], $user->password)){
            Session::put([
                "login"=>true,
                "user_id"=>$user->id,
                "patient_id"=>$user->patient->id,
                "user_fullname"=>$user->fullname
            ]);
            return redirect("/");
        }
        return redirect()->back()->withErrors(["Username or Password is incorrect!"]);
    }

    public function reqAppointment($batchId){
        $batch = Batch::find($batchId);
        if(!$batch) return redirect()->back()->withErrors(["Not Found!"]);
        return view("reqappointment",["batch"=>$batch]);
    }
    public function postAppointment(Request $req){
        $data = $req->validate([
            "appointmentdate"=>"required",
            "batch_id"=>"required",
        ]);
        
        $data["patient_id"]=Session::get("patient_id");
        $data["status"]="pending";
        $data["remarks"]="";
        $appointment = Appointment::create($data);
        if(!$appointment) return redirect()->back()->withErrors(["Task Failed!"]);
        return redirect("/")->withSuccess("Appointment Request success!");
    }
}
