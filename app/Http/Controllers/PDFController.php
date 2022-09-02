<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = [
            'title' => 'Welcome Devicon Schooling System',
            'date' => date('m/d/y')
        ];
        //$pdf = PDF::loadView('myPDF', $data);
        //return $pdf->download('schoolsystem.pdf');
        $monthnow = abs(date('m'));
        $year = abs(date('Y'));
        $student = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where('students.id', $id)->where('fees.month', $monthnow)->where('fees.year', $year)
            ->get();
        $remaining = 0;
        $paid = 0;
        $dis = 0;
        $fine = 0;
        $remaining2 = 0;
        $total_fee = 0;
        $month = abs(date('m'));
        $Remain = DB::table('fees')
            ->where('student_id', $id)
            ->where('month', '<', $month)
            ->get();
        foreach ($Remain as $key) {
            if (($key->fee_status == "pending" || $key->fee_status == "paid")) {

                $remaining += $key->fee;
            }
        }
        $Remain2 = DB::table('fees')
            ->where('student_id', $id)
            ->where('month', '<', $month)
            ->where('fee_status', '!=', "nill")
            ->get();
        foreach ($Remain2 as $key) {
            $remaining2 += $key->remaining;
            $total_fee += $key->total_fee;
            $paid += $key->feecollect;
            $dis += $key->discount;
            $fine += $key->fine;
        }
        $pdf = PDF::loadview('myPDF', ['student' => $student, 'paid' => $paid, 'fine' => $fine, 'dis' => $dis, 'total_fee' => $total_fee, 'remaining2' => $remaining2])->setPaper('a4', 'potrait');
        return $pdf->download('Voucher.pdf');
    }
    function allClassvocuher(Request $request)
    {
        $program = $request->input('program_id');
        $class = $request->input('section');
        $data = [
            'title' => 'Welcome Devicon Schooling System',
            'date' => date('m/d/y')
        ];
        //$pdf = PDF::loadView('myPDF', $data);
        //return $pdf->download('schoolsystem.pdf');
        // $monthnow = abs(date('m'));
        $monthnow = 3;
        $year = abs(date('Y'));
        $student = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where('students.program_id', $program)->where('students.class_id', $class)->where('fees.month', $monthnow)->where('fees.year', $year)
            ->get();
        $remaining = 0;
        $paid = 0;
        $dis = 0;
        $fine = 0;
        $remaining2 = 0;
        $total_fee = 0;
        $month = 3;
        // $Remain = DB::table('fees')
        //     ->where('month', '<', $month)
        //     ->where('student_id', '==', 1)
        //     ->get();
        // foreach ($Remain as $key) {
        //     if (($key->fee_status == "pending" || $key->fee_status == "paid")) {

        //         $remaining += $key->fee;
        //     }
        // }
        foreach ($student as $std) {
            $total_feeSum[] = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('total_fee');
            $paidSum = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('paid');
            $feeCollect = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('feecollect');
            $discountSum = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('discount');
            $fineSum = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('fine');

            $rem[] = DB::table('fees')
                ->where('month', '<', $month)
                ->where('fee_status', '!=', "nill")
                ->where('student_id', $std->id)->sum('remaining');
        }
        foreach ($student as $list) {
            $PDFname = date('M-Y') . " FeeVoucher " . $list->program_name  . " " . $list->class_name . " ";
        }
        $pdf = PDF::loadview('myPDF', ['student' => $student, 'paid' => $paid, 'fine' => $fineSum, 'dis' => $discountSum, 'total_fee' => $total_feeSum, 'remaining2' => $rem])->setPaper('a4', 'potrait');
        return $pdf->download($PDFname . '.pdf');
    }
}
