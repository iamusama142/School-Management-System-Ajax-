<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function store_teacher_data(Request $request)
    {
        $name = $request->teacher_name;
        $fathername = $request->teacher_father_name;
        $phone = $request->teacher_number;
        $watsapp = $request->teacher_watsapp_number;
        $blood = $request->teacher_bloodgroup;
        $joindate = $request->teacher_job_date;
        $address = $request->teacher_address;
        $permanent = $request->teacher_permanent_address;
        $qualification = $request->teacher_qualification;
        $skill = $request->teacher_skill;
        $sallery = $request->teacher_pay;
        $account = $request->teacher_account;
        $teacher_obj = new teacher();
        $teacher_obj->teacher_name = $name;
        $teacher_obj->father_name  = $fathername;
        $teacher_obj->phone  = $phone;
        $teacher_obj->watsapp  = $watsapp;
        $teacher_obj->blood_group  = $blood;
        $teacher_obj->school_joining_date  = $joindate;
        $teacher_obj->present_address  = $address;
        $teacher_obj->permanent_address  = $permanent;
        $teacher_obj->qualification  = $qualification;
        $teacher_obj->skill  = $skill;
        $teacher_obj->sallery  = $sallery;
        $teacher_obj->bank_account_number  = $account;
        $teacher_obj->save();
        $request->session()->flash('insert', 'Rocord Inserted Successfully...');
        return redirect('teachers');
    }
    public function show_teacher_data(teacher $teacher)
    {
        $datas = teacher::all();
        return view('teacher-data')->with('data', $datas);
    }
    public function edit_teacher_data(Request $request,  $eid)
    {
        $name = $request->teacher_name;
        $fathername = $request->teacher_father_name;
        $phone = $request->teacher_number;
        $watsapp = $request->teacher_watsapp_number;
        $blood = $request->teacher_bloodgroup;
        $joindate = $request->teacher_job_date;
        $address = $request->teacher_address;
        $permanent = $request->teacher_permanent_address;
        $qualification = $request->teacher_qualification;
        $skill = $request->teacher_skill;
        $sallery = $request->teacher_pay;
        $account = $request->teacher_account;
        $teacher_obj = teacher::find($eid);
        $teacher_obj->teacher_name = $name;
        $teacher_obj->father_name  = $fathername;
        $teacher_obj->phone  = $phone;
        $teacher_obj->watsapp  = $watsapp;
        $teacher_obj->blood_group  = $blood;
        $teacher_obj->school_joining_date  = $joindate;
        $teacher_obj->present_address  = $address;
        $teacher_obj->permanent_address  = $permanent;
        $teacher_obj->qualification  = $qualification;
        $teacher_obj->skill  = $skill;
        $teacher_obj->sallery  = $sallery;
        $teacher_obj->bank_account_number  = $account;
        $teacher_obj->save();
        $request->session()->flash('update', 'Rocord Updated Successfully...');
        return redirect('teachers-data');
    }
    public function update_teacher_data(Request $request, teacher $teacher, $uid)
    {

        $one = teacher::find($uid);
        return view('manage_teachers')->with('data', $one);
    }
}
