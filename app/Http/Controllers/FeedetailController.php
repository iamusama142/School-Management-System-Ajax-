<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\fee;
use App\Models\feedetail;
use App\Models\Student;
use Illuminate\Http\Request;

class FeedetailController extends Controller
{
    // Data show base on Ajax
    public function fee_ajax_table(Request $request)
    {
        $sec_id = $request->input('class_id');
        $data = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->select('students.*', 'programs.program_name', 'classes.class_name')->where('classes.class_id', $sec_id)->where('students.status', "active")
            ->get();
        $datas = fee::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
              <td>" . $item->id . "</td>
            <td>" . $item->student_name . "</td>";
            $datas = DB::table('fees')->where('student_id', $item->id)->get();
            foreach ($datas as $list) {
                $output .=
                    "<td>Fee=" . $list->fee . "<br>Fine=" . $list->fine . "<br>Paid=" . $list->feecollect . "<br>Dis=" . $list->discount . "<br>Rem=" . $list->remaining . "</td>";
            }
            "</tr>";
        }
        echo $output;
    }
    public function feerecord()
    {
        $data = Student::all();
        $datas = fee::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
               <td>" . $item->id . "</td>
             <td>" . $item->student_name . "</td>";
            $datas = DB::table('fees')->where('student_id', $item->id)->get();
            foreach ($datas as $list) {
                $output .=
                    "<td>Fee=" . $list->fee . "<br>Fine=" . $list->fine . "<br>Paid=" . $list->feecollect . "<br>Dis=" . $list->discount . "<br>Rem=" . $list->remaining . "</td>";
            }
            "</tr>";
        }
    }
    public function feedetails(request $request)
    {
        // $std_id= $request->input('id');
        // $data = fee::where('student_id',$std_id);
        // $output = '';
        // foreach ($data as $item) {
        //     $output .=  "<tr>
        //     <td>" . $item->student_id . "</td>
        //      </tr>";
        // }
        // echo $output;
    }
}
