<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singlefeeController extends Controller
{
    public function generatesinglePDF($id)
    {
        $data = [
            'title' => 'Welcome Devicon Schooling System',
            'date' => date('m/d/y')
        ];
        //$pdf = PDF::loadView('myPDF', $data);
        //return $pdf->download('schoolsystem.pdf');
        $monthnow = 2;
        $student = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where('students.id', $id)->where('fees.month', $monthnow)
            ->get();
        $remaining = 0;
        $paid = 0;
        $remaining2 = 0;
        $total_fee = 0;
        $month = 2;
        $Remain = DB::table('fees')
            ->where('student_id', $id)
            ->where('month', '<', $month)
            ->get();
        foreach ($Remain as $key) {
            if (($key->fee_status == "pending")) {

                $remaining += $key->fee;
            }
        }
        $Remain2 = DB::table('fees')
            ->where('student_id', $id)
            ->where('month', '<', $month)
            ->get();
        foreach ($Remain2 as $key) {
            $remaining2 += $key->remaining;
            $total_fee += $key->total_fee;
            $paid += $key->paid;
        }
        $pdf = PDF::loadview('singleFee', ['student' => $student, 'paid' => $paid, 'total_fee' => $total_fee, 'remaining2' => $remaining2])->setPaper('a4', 'potrait');
        return $pdf->download('Voucher.pdf');
    }
}
