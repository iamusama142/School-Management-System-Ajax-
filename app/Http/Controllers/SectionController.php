<?php

namespace App\Http\Controllers;

use App\Models\section;
use App\Models\classes;
use App\Models\roll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    function section_insert(Request $request)
    {
        $newclass = new section;
        $newclass->section_name = $request->input('section_name');
        $newclass->class_id = $request->input('class_id');
        $newclass->rollno_start = $request->input('rollno_start');
        $newclass->rollno_end = $request->input('rollno_end');
        $newclass->status = "Active";
		$newclass->save();
        $sec=$newclass->id;



        for($start=$request->input('rollno_start'); $start<= $request->input('rollno_end');$start++ )
        {
            $newroll = new roll;
            $newroll->roll_no = $start;
            $newroll->section_id=$sec;
            $newroll->roll_status="Active";
            $newroll->save();
        }



    }

    function fetch_classes()
    {
        $data= classes::where('status',"Active")->get();
        $output = '<option value=\"\">Select Class</option>';
        foreach($data as $list)
        {
            $output .="
            <option value=\" ". $list->class_id ." \" >$list->class_name </option>
            ";
        }
        echo $output;
    }

}