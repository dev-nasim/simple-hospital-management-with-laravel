<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;
use function Symfony\Component\Process\findArguments;

class AdminController extends Controller
{
    public function add_doctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.doctor.add_doctor');
            } else {
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }
    public function upload(Request $request){
        $doctor = new Doctor();
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imageName);
        $doctor->image = $imageName;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect('all_doctor')->with('message','Doctor Added');
    }

    public function all_doctor(){
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $doctors = Doctor::paginate(10);
                return view('admin.doctor.all_doctor', compact('doctors'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    public function update_doctor($id){

        $data = Doctor::find($id);
        return view('admin.doctor.update_doctor',compact('data'));

    }

    public function edit_doctor(Request $request , $id){
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $image = $request->file;
        if ($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        return redirect('all_doctor')->with('message','Doctors Data Has been Updated.');
    }

    public function delete_doctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect();
    }

    //   =================== For Appointment ===================

    public function show_appointment(){
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $appoints = Appoinment::paginate(10);
                return view('admin.appointment.show_appointment', compact('appoints'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    public function approved($id){
        $data = Appoinment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){
        $data = Appoinment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }

    public function emailview($id){
        $data = Appoinment::find($id);
        return view('admin.appointment.email_view',compact('data'));
    }


    public function send_email(Request $request, $id){
        $data = Appoinment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end' => $request->end
        ];
        Notification::send($data , new SendEmailNotification($details));
        return redirect('show_appointment')->with('message','Email Send Successful');
    }

}
