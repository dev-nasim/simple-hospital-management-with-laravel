<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appoinment;

class HomeController extends Controller
{
    public function index(){
        if (Auth::id()){
            return redirect('home');
        }else {
            $doctors = doctor::all();
            return view('user.home', compact('doctors'));
        }
    }


    public function redirect(){
        if (Auth::id()){
            if (Auth::user()->usertype=='0'){
                $doctors = doctor::all();
                return view('user.home',compact('doctors'));
            }
            else{
                $doctors = Doctor::count();
                $appointments = Appoinment::count();
                $users = User::where('usertype',0)->paginate(1);
                return view('admin.home',compact('users','doctors','appointments'));
            }
        }

        else{
            return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appoinment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->status = 'In Progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','Appointment Request Successful.We will contact with you soon.');
    }

    public function myappointment(){
        if (Auth::id()){
            if (Auth::user()->usertype == 0){
                $userid = Auth::user()->id;

                $appointments = Appoinment::where('user_id',$userid)->get();
                return view('user.my_appointment',compact('appointments'));
            }
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_appoint($id){
        $data = Appoinment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
