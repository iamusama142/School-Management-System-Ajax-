<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\classes;
use App\Models\program;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function sections_dropdown(Request $request)
    {

        $class_id=$request->post('class_id');
		$sections_data=program::where(['class_id'=>$class_id,'status'=>"Active"])->get();
        $sections_down = '<option value="">select Section</option>';
        foreach($sections_data as $list)
        {
            $sections_down .='
            <option value= "'. $list->section_id .'" >'.$list->section_name.' </option>
            ';
        }
        return response()->json([$sections_down]);
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
    public function subject_insert(Request $request)
    {
        $obj_subject = new subject();
        $obj_subject->class_id=$request->input('class_id');
        $obj_subject->section_id=$request->input('section_id');
        $obj_subject->subject_name=$request->input('subject_name');
        $obj_subject->save();
    }
}
