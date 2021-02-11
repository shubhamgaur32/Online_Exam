<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;

class StudentController extends Controller
{
    public function login()
    {
        return view('student.login'); 
    }

    public function loginSub(Request $request)
    {
        $resp=students::where('email',$request->email)->where('password',$request->password)->get()->first();
        if($resp)
        {
            $request->session()->put('id',$resp->id);
            $arr=array('status'=>'true','message'=>'Success','reload'=>url('student/dashboard'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>'Email or Password Incorrect');
        }
        echo json_encode($arr);   
    }
}
