<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\students;

class StudentOperation extends Controller
{
    public function dashboard()
    {
        if(!Session::get('id'))
        {
            return redirect(url('student/login'));
            die();
        }
        return view('student/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id');
        return redirect(url('student/login'));
    }

    public function exam()
    {
        $student_info=students::select(['students.*','exam_master.title','exam_master.exam_date'])->join('exam_master','students.exam','=','exam_master.id')
        ->where('students.id',Session::get('id'))->get()->first();
        return view('student.exam',['student_info'=>$student_info]);
    }


    public function join_exam()
    {
        return view('student.join_exam');
    }
}
