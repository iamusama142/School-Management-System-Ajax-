<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parents;

class ParentsController extends Controller
{
    function parent_insert(Request $request)
    {
        $parent = new Parents;
        $parent->parent_name = $request->input('parent_name');
        $parent->phone = $request->input('phone');
        $parent->Gender = $request->input('gender');
        $parent->cnic = $request->input('cnic');
        $parent->address = $request->input('address');
        $parent->email = $request->input('email');
        $parent->about = $request->input('about');
        $parent->password = $request->input('password');
        $parent->status ="Active";
		$parent->save();
    }


    public function edit(Request $request) {

        $id=$request->id;
        $data= Parents::where('parent_id', $id)->get();
        return response()->json($data);
	}

    function Fetch_parents()
    {
        $datas= Parents::all();


    }

    function parent_update(Request $request){

               $id= $request->input('id');
                Parents::where('parent_id', $id)
               ->update([
                   'parent_name' => $request->input('parent_name') ,
                   'phone' => $request->input('phone') ,
                   'gender' => $request->input('gender') ,
                   'cnic' => $request->input('cnic') ,
                   'address' => $request->input('address') ,
                   'email' => $request->input('email') ,
                   'password' => $request->input('password') ,
                   'status' => $request->input('status') ,
                ]);


       return response()->json([
        'status' => 200,
        ]);
    }


    function test(){
        $id=1;
        Parents::where('parent_id', $id)
       ->update([
           'parent_name' => 1 ,
           'phone' =>1 ,
           'gender' => 1 ,
           'cnic' => 1 ,
           'address' => 1 ,
           'email' => 1 ,
           'password' => 1 ,
           'status' =>1 ,


        ]);
   }



    function duplicate_phone_insertion(Request $request){

        $phone = $request->input('phone');

        $duplicates= DB::table('parents')
        ->where('phone', $phone)
        ->count();

        if($duplicates==0){
            //means valid
            return response()->json(array("exists" => true));
        }else{
            //means already exist
            return response()->json(array("exists" => false));
        }

    }

    function duplicate_email_insertion(Request $request){

        $email = $request->input('email');

        $duplicates= DB::table('parents')
        ->where('email', $email)
        ->count();

        if($duplicates==0){
            //means valid
            return response()->json(array("exists" => true));
        }else{
            //means already exist
            return response()->json(array("exists" => false));
        }

    }
    function duplicate_cnic_insertion(Request $request)
    {
        $cnic = $request->input('cnic');

        $duplicates= DB::table('parents')
        ->where('cnic', $cnic)
        ->count();

        if($duplicates==0){

            //means valid
            return response()->json(array("exists" => true));
        }else{
            //means already exist
            return response()->json(array("exists" => false));
        }
    }






    function duplicate_phone_updation(Request $request){

        $phone = $request->input('phone');

        $parent_id = $request->input('id');
        $duplicates= DB::table('parents')
        ->where('phone', $phone)
        ->count();

        $id_duplicates= DB::table('parents')
        ->where(['parent_id'=> $parent_id,'phone'=> $phone  ])
        ->count();
        if($id_duplicates==0 && $duplicates>=1)
        {
            //means already exist
            return response()->json(array("exists" => false));
        }

         else if($id_duplicates==1)
         {
             //means valid
             return response()->json(array("exists" => true));
         }
         else
        {
            //means already exist
            return response()->json(array("exists" => true));
        }




    }

    function duplicate_email_updation(Request $request){

        $email = $request->input('email');


        $parent_id = $request->input('id');
        $duplicates= DB::table('parents')
        ->where('email', $email)
        ->count();

        $id_duplicates= DB::table('parents')
        ->where(['parent_id'=> $parent_id,'email'=> $email  ])
        ->count();
        if($id_duplicates==0 && $duplicates>=1)
        {
            //means already exist
            return response()->json(array("exists" => false));
        }

         else if($id_duplicates==1)
         {
             //means valid
             return response()->json(array("exists" => true));
         }
         else
        {
            //means already exist
            return response()->json(array("exists" => true));
        }

    }
    function duplicate_cnic_updation(Request $request)
    {
        $cnic = $request->input('cnic');
        $parent_id = $request->input('id');
        $duplicates= DB::table('parents')
        ->where('cnic', $cnic)
        ->count();

        $id_duplicates= DB::table('parents')
        ->where(['parent_id'=> $parent_id,'cnic'=> $cnic  ])
        ->count();
        if($id_duplicates==0 && $duplicates>=1)
        {
            //means already exist
            return response()->json(array("exists" => false));
        }

         else if($id_duplicates==1)
         {
             //means valid
             return response()->json(array("exists" => true));
         }
         else
        {
            //means already exist
            return response()->json(array("exists" => true));
        }
    }





    function fetchall()
    {
        $data= Parents::all();
        $output = '';
        foreach($data as $list)
        {
            $output .=  "<tr>
            <td>".$list->parent_id."</td>
            <td>".$list->parent_name."</td>
            <td>".$list->phone ." </td>
            <td>".$list->cnic ." </td>
            <td><span class=\"badge badge-pill  ";
            if($list->status == "Active")
            {
                $output .= "badge-success";
            }else{
                $output .= "badge-danger";
            }
           // $output .= ($list->status == "Active") ?  "badge-success" : "badge-danger";
            $output .= " \" > ".$list->status ." </span></td>
            <td id=\"".$list->parent_id."\" class=\"btn btn-primary mt-2 editIcon update\" data-toggle=\"modal\" data-target=\"#myModal\">Update</td>
        </tr>";

        }
        echo $output;
    }



}