<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_master;
use App\students;
use Session;
use Validator;

class PortalOperation extends Controller
{
   /* public function __construct()
    {
        if(Session::get('portalSession'))
        {
            return redirect('portal/login');
        }
    }*/


    public function dashboard()
    {
        if(!Session::get('portalSession'))
        {
            return redirect('portal/login');
        }
        $data['portalExams']=exam_master::select(['exam_master.*','categories.name as cat_name'])
        ->join('categories','exam_master.category','=','categories.id')
        ->orderBy('id','desc')->where('exam_master.status','1')->get()->toArray();
        return view('portal.dashboard',$data);
    }


    public function examForm($id)
    {
        $data['id']=$id;
        $exam_info=exam_master::where('id',$id)->get()->first();
        $data['exam_title']=$exam_info->title;
        $data['exam_date']=$exam_info->exam_date;
        return view('portal.examForm',$data);
    }


    public function examFormSubmit(Request $request)
    {
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes())
        {
                $std=new students(); 
                $std->name=$request->name;
                $std->email=$request->email;
                $std->mobile_no=$request->mobile_no;
                $std->exam=$request->id;
                $std->dob=$request->dob;
                $std->password=$request->password;
                //$portal->status=1;
                $std->save();
                $arr=array('status'=>'true','message'=>'Success','reload'=>url('portal/print/'.$std->id));
            
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
            print_r($arr);
        }
        echo json_encode($arr);
    }


    public function print($id)
    {
        $std_info=students::where('id',$id)->get()->first();
        $exam_info=exam_master::where('id',$std_info->exam)->get()->first();
        $exam_title=$exam_info['title'];
        $exam_date=$exam_info['exam_date'];
        //$exam_title= $exam_info->title;
        //$exam_date= $exam_info->exam_date;
        return view('portal.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date]);
    }


    public function updateForm()
    {
        $data['exams']=exam_master::where('status','1')->get()->toArray();
        return view('portal.updateForm',$data);
    }


    public function student_exam_info()
    {
        $data['exam_info']=exam_master::where('id',$_GET['exam'])->get()->first();
        $data['students_info']=students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
        return view('portal.student_exam_info',$data);
    }


    public function student_exam_info_edit(Request $request)
    {
        $std=students::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        if($request->password)
        {
            $std->password=$request->password;
        }
        $std->update();
        echo json_encode(array('status'=>'true','message'=>'Success','reload'=>url('portal/updateForm')));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('portalSession');
        return redirect(url('portal/login'));
    }
    
}
