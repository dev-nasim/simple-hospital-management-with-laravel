<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_doctor(){
        return view('admin.doctor.add_doctor');
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
        return redirect()->back()->with('message','Doctor Added');
    }
}
