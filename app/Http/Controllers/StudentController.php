<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\fee;

use App\Models\program;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;

use function PHPUnit\Framework\returnSelf;

class StudentController extends Controller
{
    function program_dropdown()
    {
        $program_data = program::all()->where('status', "Active");
        $program_down = '<option >Select Class</option>';
        foreach ($program_data as $list) {
            $program_down .= '
            <option value= "' . $list->program_id . '" >' . $list->program_name . ' </option>
            ';
        }
        return response()->json([$program_down]);
    }
    function classes_dropdown(Request $request)
    {
        $program_id = $request->post('program_id');
        $classes_data = classes::where(['program_id' => $program_id, 'status' => "Active"])->get();
        $classes_down = '<option  value=\"\">Select Section</option>';
        foreach ($classes_data as $list) {
            $classes_down .= '
            <option value= "' . $list->class_id . '" >' . $list->class_name . ' </option>
            ';
        }
        return response()->json([$classes_down]);
    }
    public function store(Request $request)
    {
        $stdname = $request->fullname;
        $stdurdu = $request->nameurdu;
        $stdfname = $request->fathername;
        $stdfurdu = $request->fathernameurdu;
        $stdphone = $request->pnum;
        $stdephone = $request->emrnum;
        $stdadd = $request->address;
        $stdpadd = $request->paddress;
        $stddb = $request->dob;
        $stdda = $request->doa;
        $stdclass = $request->program_id;
        $stdsection = $request->section;
        $stdroll = $request->rollno;
        $stdadmission = $request->adfee;
        $stdadmissionrem = $request->readmissionfee;
        $stdadmissiondate = $request->admissiontime;
        $stdtution = $request->tfee;
        $std_obj = new Student();
        $std_obj->student_name = $stdname;
        $std_obj->student_urdu = $stdurdu;
        $std_obj->father_name =  $stdfname;
        $std_obj->father_urdu = $stdfurdu;
        $std_obj->phone = $stdphone;
        $std_obj->emergencyphone = $stdephone;
        $std_obj->address =   $stdadd;
        $std_obj->permanentphone = $stdpadd;
        $std_obj->dateofbirth = $stddb;
        $std_obj->dateofadmission = $stdda;
        $std_obj->program_id =  $stdclass;
        $std_obj->class_id =  $stdsection;
        $std_obj->rollno =  $stdroll;
        $std_obj->admissionfee  =  $stdadmission;
        $std_obj->remainingadmissionfee  =  $stdadmissionrem;
        $std_obj->admissionfeegiven  =  $stdadmissiondate;
        $std_obj->tutionfee  = $stdtution;
        $std_obj->status  = "active";
        $std_obj->save();
        $student_id = $std_obj->id;
        $month = explode('-', $request->doa);
        if (abs($month[1]) == "1") {
            for ($start = abs($month[1]); $start <= 12; $start++) {
                $feeObj = new fee();
                $feeObj->fee = $stdtution;
                $feeObj->student_id = $student_id;
                $feeObj->due_date = 0;
                $feeObj->after_date = 0;
                $feeObj->total_fee = $stdtution;
                $feeObj->paid = 0;
                $feeObj->remaining = 0;
                $feeObj->fee_status = "pending";
                $feeObj->discount = '0';
                $feeObj->feecollect = '0';
                $feeObj->fine = '0';
                $feeObj->month = $start;
                $feeObj->day = $month[2];
                $feeObj->year = $month[0];
                $feeObj->save();
            }
        } else {
            for ($start2 = 1; $start2 < $month[1]; $start2++) {
                $feeObj = new fee();
                $feeObj->fee = 0;
                $feeObj->student_id = $student_id;
                $feeObj->due_date = 0;
                $feeObj->after_date = 0;
                $feeObj->total_fee = 0;
                $feeObj->paid = 0;
                $feeObj->remaining = 0;
                $feeObj->fee_status = "nill";
                $feeObj->discount = '0';
                $feeObj->feecollect = '0';
                $feeObj->fine = '0';
                $feeObj->month = $start2;
                $feeObj->day = $month[2];
                $feeObj->year = $month[0];
                $feeObj->save();
            }
            for ($start = abs($month[1]); $start <= 12; $start++) {
                $feeObj = new fee();
                $feeObj->fee = $stdtution;
                $feeObj->student_id = $student_id;
                $feeObj->due_date = 0;
                $feeObj->after_date = 0;
                $feeObj->total_fee = $stdtution;
                $feeObj->paid = 0;
                $feeObj->remaining = 0;
                $feeObj->fee_status = "pending";
                $feeObj->discount = '0';
                $feeObj->feecollect = '0';
                $feeObj->fine = '0';
                $feeObj->month = $start;
                $feeObj->day = $month[2];
                $feeObj->year = $month[0];
                $feeObj->save();
            }
        }
    }
    public function edit(Request $request, $eid)
    {
        $stdname = $request->fullname;
        $stdfname = $request->fathername;
        $stdphone = $request->pnum;
        $stdephone = $request->emrnum;
        $stdadd = $request->address;
        $stdpadd = $request->paddress;
        $stdclass = $request->class;
        $stdsection = $request->section;
        $stddb = $request->dob;
        $stdda = $request->doa;
        $stdcat = $request->category;
        $stddis = $request->discount;
        $std_obj = Student::find($eid);
        $std_obj = new Student();
        $std_obj->studentname = $stdname;
        $std_obj->fathername =  $stdfname;
        $std_obj->phone = $stdphone;
        $std_obj->emergencyphone = $stdephone;
        $std_obj->address =   $stdadd;
        $std_obj->permanentaddress = $stdpadd;
        $std_obj->class =  $stdclass;
        $std_obj->section  = $stdsection;
        $std_obj->dateofbirth = $stddb;
        $std_obj->dateofadmission = $stdda;
        $std_obj->category  = $stdcat;
        $std_obj->discount = $stddis;
        $std_obj->save();
        return redirect('/datatables');
    }
    public function showStudent(Student $Student)
    {
        $datas = Student::all()->where('status', "Active");
        $output = '<option value=\"\">Class</option>';
        foreach ($datas as $list) {
            $output .= "
            <option value=\" " . $list->id . " \" >$list->student_name</option>
            ";
        }
        echo $output;
        return view('datatables')->with('data', $datas);
    }
    function student_feeHistory(Request $request)
    {
        $id = $request->input('id');
        // $std_id = $request->input('id');
        // $data = fee::where('student_id', $std_id);
        // $output = '';
        // foreach ($data as $item) {
        //     $output .=  "<tr>
        //     <td>" . $item->student_id . "</td>
        //      </tr>";
        // }
        // echo $output;
        $data = DB::table('students')->where('id', $id)->get();
        // $data = Student::all();
        $datas = fee::where('student_id', $id);
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
        return $output;
    }
    public function studentrecord()
    {
        $m = abs(date('m'));
        $data = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where('fees.month', $m)->where('students.status', "active")
            ->get();
        //$data = Student::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
            <td>" . $item->id . "</td>
            <td>" . $item->student_name . "</td>
            <td>" . $item->student_urdu . "</td>
            <td>" . $item->father_name . "</td>
            <td>" . $item->father_urdu . "</td>
            <td>" . $item->phone . "</td>
            <td>" . $item->emergencyphone . "</td>
            <td>" . $item->address . "</td>
            <td>" . $item->permanentphone . "</td>
            <td>" . $item->dateofbirth . "</td>
            <td>" . $item->dateofadmission . "</td>
            <td>" . $item->program_name . "</td>
             <td>" . $item->class_name . "</td>
            <td>" . $item->rollno . "</td>
            <td>" . $item->admissionfee . "</td>
            <td>" . $item->remainingadmissionfee . "</td>
            <td>" . $item->admissionfeegiven . "</td>
            <td>" . $item->tutionfee . "</td>
            <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-primary editIcon update\" data-toggle=\"modal\" data-target=\"#myModal\">Update</a></td>
            <td> <a href=\"/voucher/" . $item->id . "\"><button class=\" btn btn-warning  \"> Fee Voucher</button></a></td>" . (($item->fee_status == "pending") ? "<td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger editIcon \" data-toggle=\"modal\" data-target=\"#myfeeModal\">Collect Fee</a></td>" : '<td><span class="badge badge-pill  badge-success">Already paid</span></td>') .
                "<td > <a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-success  feeHistory\" data-toggle=\"modal\" data-target=\"#feehistorymodal\">Fee History</a> </td>
                <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger  editIcon \" data-toggle=\"modal\" data-target=\"#admissionfeehistorymodal\">Collect Admission Fee</a></td>
                </tr>";
        }
        echo $output;
    }
    public function editstudent(Request $request)
    {
        $id = $request->id;
        $data = Student::where('id', $id)->get();
        return response()->json($data);
    }
    // Update Record After Load in Modal
    public function updatestudent(Request $request)
    {
        // echo  "<pre>";
        // print_r($request->all());
        // die;
        $id = $request->input('id');
        Student::where('id', $id)
            ->update([
                'student_name' => $request->input('student_name'),
                'student_urdu' => $request->input('student_name_urdu'),
                'father_name' => $request->input('father_name'),
                'father_urdu' => $request->input('father_name_urdu'),
                'phone' => $request->input('phone'),
                'emergencyphone' => $request->input('emergencyphone'),
                'address' => $request->input('address'),
                'permanentphone' => $request->input('permanentaddress'),
                'dateofbirth' => $request->input('dob'),
                'dateofadmission' => $request->input('doa'),
                'rollno' => $request->input('rollnumber'),
                'admissionfee' => $request->input('adfee'),
                'remainingadmissionfee' => $request->input('readmissionfee'),
                'admissionfeegiven' => $request->input('admissiontime'),
                'tutionfee' => $request->input('tfee'),
                'status' => $request->input('action_name'),
            ]);
        fee::where('student_id', $id)->where('fee_status', '!=', 'nill')
            ->update([
                'fee' => $request->input('tution'),
                'total_fee' => $request->input('tution'),
            ]);
        return view('/manageDeactive');
    }
    // Data show base on Ajax
    public function student_ajax(Request $res)
    {
        $paid = "paid";
        $m = abs(date('m'));
        $sec_id = $res->input('class_id');
        $data = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where(['classes.class_id' => $sec_id, 'fees.month' => $m])->where('students.status', "active")
            ->get();
        //$data = Student::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
            <td>" . $item->id . "</td>
            <td>" . $item->student_name . "</td>
            <td>" . $item->student_urdu . "</td>dasg sja
            <td>" . $item->father_name . "</td>
            <td>" . $item->father_urdu . "</td>
            <td>" . $item->phone . "</td>dsadjv
            <td>" . $item->emergencyphone . "</td>
            <td>" . $item->address . "</td>
            <td>" . $item->permanentphone . "</td>
            <td>" . $item->dateofbirth . "</td>
            <td>" . $item->dateofadmission . "</td>
            <td>" . $item->program_name . "</td>
            <td>" . $item->class_name . "</td>
            <td>" . $item->rollno . "</td>
            <td>" . $item->admissionfee . "</td>
            <td>" . $item->remainingadmissionfee . "</td>
            <td>" . $item->admissionfeegiven . "</td>
            <td>" . $item->tutionfee . "</td>
            <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-primary editIcon update\" data-toggle=\"modal\" data-target=\"#myModal\">Update</a></td>
            <td> <a href=\"/voucher/" . $item->id . "\"><button class=\" btn btn-warning \">Fee Voucher</button></a></td>" . (($item->fee_status == "pending") ? "<td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger editIcon \" data-toggle=\"modal\" data-target=\"#myfeeModal\">Collect Fee</a></td>" : '<td><span class="badge badge-pill  badge-success">Already paid</span></td>') .
                "<td > <a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-success  feeHistory\" data-toggle=\"modal\" data-target=\"#feehistorymodal\">Fee History</a> </td>
                <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger  editIcon \" data-toggle=\"modal\" data-target=\"#admissionfeehistorymodal\">Collect Admission Fee</a></td>
                </tr>";
        }
        echo $output;
    }
    public function feestudent(Request $request)
    {
        $id = $request->id;
        // $data = Student::where('id', $id)->get();
        $monthnow = abs(date('m'));
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
        $month = abs(date('m'));
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
        return response()->json(['student' => $student, 'paid' => $paid, 'total_fee' => $total_fee, 'remaining2' => $remaining2]);
    }
    //  Admission Fee Ajax Start
    public function feeremaining(Request $request)
    {
        $id = $request->id;
        // $data = Student::where('id', $id)->get()
        $monthnow = abs(date('m'));
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
        $month = abs(date('m'));
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
        return response()->json(['student' => $student, 'paid' => $paid, 'total_fee' => $total_fee, 'remaining2' => $remaining2]);
    }
    // Admission Fee Ajax End
    // Admission Fee Update Start
    public function admission_update_fee(Request $request)
    {
        $id = $request->input('id');
        Student::where('id', $id)
            ->update([
                'remainingadmissionfee' => $request->input('total_admission_fee_collect'),
            ]);
        return redirect('student-datatable');
    }
    // Admission Fee Update End
    public function update_fee(Request $request)
    {
        //   echo  "<pre>";
        //   print_r($request->all());
        //   die;
        $std_id = $request->input('std_id');
        $month = abs($request->input('fee_month'));
        $year = abs($request->input('fee_year'));
        // echo $std_id." ".$month." ".$year;
        // die();
        DB::table('fees')
            ->where(['month' => $month, 'year' => $year, 'student_id' => $std_id])
            ->update([
                'feecollect' => $request->input('collect_fee'),
                'remaining' => $request->input('total_fee_rem'),
                'fine' => $request->input('student_fine'),
                'discount' => $request->input('student_discount'),
                'fee_status' => 'paid',

            ]);
        return redirect('student-datatable');
    }
    function student_promotion(Request $request)
    {
        $old_class = $request->input("old_class_id");
        $old_class = (int)$old_class;
        $old_section = $request->input("old_section_id");
        $old_section = (int)$old_section;
        $promotion_fee = $request->input("promotion_fee");
        $promotion_fee = (int)$promotion_fee;
        $studentData = Student::where(['program_id' => $old_class, 'class_id' => $old_section])
            ->where('status', 'active')
            ->get();
        foreach ($studentData as $list) {
            $std_obj = new Student();
            $std_obj->student_name = $list->student_name;
            $std_obj->student_urdu = $list->student_urdu;
            $std_obj->father_name =  $list->father_name;
            $std_obj->father_urdu = $list->father_urdu;
            $std_obj->phone = $list->phone;
            $std_obj->emergencyphone = $list->emergencyphone;
            $std_obj->address =   $list->address;
            $std_obj->permanentphone = $list->permanentphone;
            $std_obj->dateofbirth = $list->dateofbirth;
            $std_obj->dateofadmission = $list->dateofadmission;
            $std_obj->program_id = $request->input('new_class_id');
            $std_obj->class_id =  $request->input('new_section_id');
            $std_obj->rollno =  $list->rollno;
            $std_obj->admissionfee  =  $list->admissionfee;
            $std_obj->remainingadmissionfee  =  $list->remainingadmissionfee;
            $std_obj->admissionfeegiven  =  $list->admissionfeegiven;
            $std_obj->tutionfee  = $list->tutionfee +  $promotion_fee;
            $std_obj->status  = "active";
            $std_obj->save();
            Student::where('id', $list->id)->update([
                'status' => "Passed"
            ]);
            $student_id = $std_obj->id;
            for ($start = 1; $start <= 12; $start++) {
                $feeObj = new fee();
                $feeObj->fee = $list->tutionfee +  $promotion_fee;
                $feeObj->student_id = $student_id;
                $feeObj->due_date = 0;
                $feeObj->after_date = 0;
                $feeObj->total_fee = $list->tutionfee +  $promotion_fee;
                $feeObj->paid = 0;
                $feeObj->remaining = 0;
                $feeObj->fee_status = "pending";
                $feeObj->discount = '0';
                $feeObj->feecollect = '0';
                $feeObj->fine = '0';
                $feeObj->month = $start;
                $feeObj->day = 1;
                $feeObj->year = date('Y');
                $feeObj->save();
            }
        }
        return redirect('/student-promotion');
    }
    function allClassvocuher(Request $request)
    {
        return $request->input();
    }
    //    Start of Deactive Students Functions
    public function studentDeactiverecord()
    {
        $m = abs(date('m'));
        $data = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where('fees.month', $m)->where('students.status', "deactive")
            ->get();
        //$data = Student::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
            <td>" . $item->id . "</td>
            <td>" . $item->student_name . "</td>
            <td>" . $item->student_urdu . "</td>
            <td>" . $item->father_name . "</td>
            <td>" . $item->father_urdu . "</td>
            <td>" . $item->phone . "</td>
            <td>" . $item->emergencyphone . "</td>
            <td>" . $item->address . "</td>
            <td>" . $item->permanentphone . "</td>
            <td>" . $item->dateofbirth . "</td>
            <td>" . $item->dateofadmission . "</td>
            <td>" . $item->program_name . "</td>
             <td>" . $item->class_name . "</td>
            <td>" . $item->rollno . "</td>
            <td>" . $item->admissionfee . "</td>
            <td>" . $item->remainingadmissionfee . "</td>
            <td>" . $item->admissionfeegiven . "</td>
            <td>" . $item->tutionfee . "</td>
            <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-primary editIcon update\" data-toggle=\"modal\" data-target=\"#myModal\">Update</a></td>
            <td> <a href=\"/voucher/" . $item->id . "\"><button class=\" btn btn-warning \">Fees</button></a></td>" . (($item->fee_status == "pending") ? "<td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger editIcon \" data-toggle=\"modal\" data-target=\"#myfeeModal\">Collect Fee</a></td>" : '<td><span class="badge badge-pill  badge-success">Already paid</span></td>') .
                "<td > <a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-success  feeHistory\" data-toggle=\"modal\" data-target=\"#feehistorymodal\">Fee History</a> </td>
                <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger  editIcon \" data-toggle=\"modal\" data-target=\"#admissionfeehistorymodal\">Collect Admission Fee</a></td>
                </tr>";
        }
        echo $output;
    }
    public function editDeactivestudent(Request $request)
    {
        $id = $request->id;
        $data = Student::where('id', $id)->get();
        return response()->json($data);
    }
    public function updateDeactivestudent(Request $request)
    {
        // echo  "<pre>";
        // print_r($request->all());
        // die;
        $id = $request->input('id');
        Student::where('id', $id)
            ->update([
                'student_name' => $request->input('student_name'),
                'student_urdu' => $request->input('student_name_urdu'),
                'father_name' => $request->input('father_name'),
                'father_urdu' => $request->input('father_name_urdu'),
                'phone' => $request->input('phone'),
                'emergencyphone' => $request->input('emergencyphone'),
                'address' => $request->input('address'),
                'permanentphone' => $request->input('permanentaddress'),
                'dateofbirth' => $request->input('dob'),
                'dateofadmission' => $request->input('doa'),
                'rollno' => $request->input('rollnumber'),
                'admissionfee' => $request->input('adfee'),
                'remainingadmissionfee' => $request->input('readmissionfee'),
                'admissionfeegiven' => $request->input('admissiontime'),
                'tutionfee' => $request->input('tfee'),
                'status' => $request->input('action_name'),
            ]);
        return view('/manageDeactive');
    }
    // Data show base on Ajax
    public function studentDeactiveajax(Request $res)
    {
        $paid = "paid";
        $m = abs(date('m'));
        $sec_id = $res->input('class_id');
        $data = DB::table('students')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('classes', 'classes.class_id', '=', 'students.class_id')
            ->join('fees', 'fees.student_id', '=', 'students.id')
            ->select('*')->where(['classes.class_id' => $sec_id, 'fees.month' => $m])->where('students.status', "deactive")
            ->get();
        //$data = Student::all();
        $output = '';
        foreach ($data as $item) {
            $output .=  "<tr>
         <td>" . $item->id . "</td>
         <td>" . $item->student_name . "</td>
         <td>" . $item->student_urdu . "</td>dasg sja
         <td>" . $item->father_name . "</td>
         <td>" . $item->father_urdu . "</td>
         <td>" . $item->phone . "</td>dsadjv
         <td>" . $item->emergencyphone . "</td>
         <td>" . $item->address . "</td>
         <td>" . $item->permanentphone . "</td>
         <td>" . $item->dateofbirth . "</td>
         <td>" . $item->dateofadmission . "</td>
         <td>" . $item->program_name . "</td>
         <td>" . $item->class_name . "</td>
         <td>" . $item->rollno . "</td>
         <td>" . $item->admissionfee . "</td>
         <td>" . $item->remainingadmissionfee . "</td>
         <td>" . $item->admissionfeegiven . "</td>
         <td>" . $item->tutionfee . "</td>
         <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-primary editIcon update\" data-toggle=\"modal\" data-target=\"#myModal\">Update</a></td>
         <td> <a href=\"/voucher/" . $item->id . "\"><button class=\" btn btn-warning \">Fees</button></a></td>" . (($item->fee_status == "pending") ? "<td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger editIcon \" data-toggle=\"modal\" data-target=\"#myfeeModal\">Collect Fee</a></td>" : '<td><span class="badge badge-pill  badge-success">Already paid</span></td>') .
                "<td > <a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-success  feeHistory\" data-toggle=\"modal\" data-target=\"#feehistorymodal\">Fee History</a> </td>
             <td><a style='color:#fff !important;' id=\"" . $item->id . "\" class=\"btn btn-danger  editIcon \" data-toggle=\"modal\" data-target=\"#admissionfeehistorymodal\">Collect Admission Fee</a></td>
             </tr>";
        }
        echo $output;
    }
    // End of Deactive Students Functions
}
