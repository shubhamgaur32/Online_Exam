<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\exam_master;
use App\students;
use App\portal;
use Validator;
use Session;
use App\question_ans;

class Admin extends Controller
{
    public function dashboard()
    {
        if(!Session::get('AdminSession'))
        {
            return redirect('/');
        }
        else
        {
            return view('admin.dashboard');    
        }
        
    }

    public function examCategory()
    {
        //echo "exam Category";
        $data['category']=category::orderBy('id','desc')->get()->toArray();
        //print_r($data['category']);
        //die();
        return view('admin.examCategory',$data);
    }

    public function addNewCategory(Request $request)
    {
        //print_r($request->all());
        $validator =  Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {
            $cat=new category();
            $cat->name=$request->name;
            $cat->status=1;
            $cat->save();
            $arr=array('status'=>'true','message'=>'Success','reload'=>url('admin/examCategory'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function deleteCategory($id)
    {
        $cat = category::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/examCategory'));
    }

    public function editCategory($id)
    {
        $category = category::where('id',$id)->get()->first();
        return view('admin.editCategory',['category'=>$category]);
    }


    public function editNewCategory(Request $request)
    {
        $cat = category::where('id',$request->id)->get()->first();
        $cat->name=$request->name;
        $cat->update();
        echo json_encode(array('status'=>'true','message'=>'Category Successfully Updaed','reload'=> url('admin/examCategory')));
     
    //print_r($request->all());
    }

    public function categoryStatus($id)
    {
       $cat=category::where('id',$id)->get()->first();
        if($cat->status==1)
            $status=0;
        else
            $status=1;

        $cat1=category::where('id',$id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }

    public function examManage()
    {
        $data['category']=category::orderBy('id','desc')->where('status','1')->get()->toArray();
        
        $data['exams']=exam_master::
        select(['exam_master.*','categories.name as cat_name'])
        ->orderBy('id','desc')
        ->join('categories','exam_master.category','=','categories.id')
        ->get()->toArray();
        
        return view('admin.examManage',$data);
    }

    public function addNewExam(Request $request)
    {
        $validator=Validator::make($request->all(),['title'=>'required','exam_date'=>'required','category'=>'required']);
        if($validator->passes())
        {
            $exam= new exam_master();
            $exam->title=$request->title;
            $exam->exam_date=$request->exam_date;
            $exam->category=$request->category;
            $exam->status=1;
            $exam->save();
            $arr=array('status'=>'true','message'=>'Exam Successfully Added','reload'=>url('admin/examManage'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
       // echo "<pre>";
       // print_r($request->all());
    }


    public function examStatus($id)
    {
        $exam=exam_master::where('id',$id)->get()->first();
        if($exam->status==1)
            $status=0;
        else
            $status=1;

        $exam1=exam_master::where('id',$id)->get()->first();
        $exam1->status=$status;
        $exam1->update();
    }

    public function deleteExam($id)
    {
        $exam1=exam_master::where('id',$id)->get()->first();
        $exam1->delete();
        return redirect(url('admin/examManage'));
    }

    
    public function editExam($id)
    {
        //print_r($exam);
        $data['exam']=exam_master::where('id',$id)->get()->first();
        $data['category']=category::orderBy('id','desc')->where('status','1')->get()->toArray();
        return view('admin.editExam',$data);
    }

    public function editExamSub(Request $request)
    {
        //echo "<pre>";
       // print_r($request->all());
       $exam=exam_master::where('id',$request->id)->get()->first();
       $exam->title=$request->title;
       $exam->exam_date=$request->exam_date;
       $exam->category=$request->category;
       $exam->update();
       echo json_encode(array('status'=>'true','message'=>'Exam Successfully Updated','reload'=>url('admin/examManage')));
    }

    public function studentsManage()
    {
        $data['exams']=exam_master::where('status','1')->get()->toArray();
        $data['students']=students::select(['students.*','exam_master.title as ex_name','exam_master.exam_date'])
        ->orderBy('id','desc')
        ->join('exam_master','students.exam','=','exam_master.id')
        ->get()->toArray();
        return view('admin.studentsManage',$data);
    }

    public function addNewStudent(Request $request)
    {
        //echo "<pre>";
        //print_r($request->all());
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required','password'=>'required']); 
        if($validator->passes())
        {
            $std = new students();
            $std->name=$request->name;
            $std->email=$request->email;
            $std->mobile_no=$request->mobile_no;
            $std->dob=$request->dob;
            $std->exam=$request->exam;
            $std->password=$request->password;
            $std->status=1;
            $std->save();
            $arr=array('status'=>'true','message'=>'Student Successfully Added','reload'=>url('admin/studentsManage'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function studentStatus($id)
    {
        $std=students::where('id',$id)->get()->first();
        if($std->status==1)
            $status=0;
        else
            $status=1;

        $std1=students::where('id',$id)->get()->first();
        $std1->status=$status;
        $std1->update();
    }


    public function deleteStudent($id)
    {
        $std=students::where('id',$id)->get()->first();
        $std->delete();
        return redirect(url('admin/studentsManage'));
    } 


    public function editStudent($id)
    {
        $std=students::where('id',$id)->get()->first();
        $exams=exam_master::where('status','1')->get()->toArray();
        return view('admin.editStudent',['students'=>$std,'exams'=>$exams]);
    }

    public function editStudentFinal(Request $request)
    {
        $std=students::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        $std->exam=$request->exam;
        if($request->password!= '')
        {
            $std->password=$request->password; 
        }   
        $std->update();
        echo json_encode(array('status'=>'true','message'=>'Student Successfully Updated','reload'=>url('admin/studentsManage')));
    }


    public function portalManage()
    {
        $data['portal']=portal::orderBy('id','desc')->get()->toArray();
        return view('admin.portalManage',$data);
    }

    public function addNewPortal(Request $request)
    {
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']); 
        if($validator->passes())
        {
            $p = new portal();
            $p->name=$request->name;
            $p->email=$request->email;
            $p->mobile_no=$request->mobile_no;
            $p->password=$request->password;
            $p->status=1;
            $p->save();
            $arr=array('status'=>'true','message'=>'Portal Successfully Added','reload'=>url('admin/portalManage'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function portalStatus($id)
    {
        $p=portal::where('id',$id)->get()->first();
        if($p->status==1)
            $status=0;
        else
            $status=1;

        $p1=portal::where('id',$id)->get()->first();
        $p1->status=$status;
        $p1->update();
    }

    public function deletePortal($id)
    {
        $portal=portal::where('id',$id)->get()->first();
        $portal->delete();
        return redirect(url('admin/portalManage'));
    }

    public function editPortal($id)
    {
        $data['portal_info']=portal::where('id',$id)->get()->first();
        return view('admin.editPortal',$data);
    }

    public function editPortalSub(Request $request)
    {
        $portal=portal::where('id',$request->id)->get()->first();
        $portal->name=$request->name;
        $portal->email=$request->email;
        $portal->mobile_no=$request->mobile_no;
        if($request->password!='')
            $portal->password=$request->password;
        //$portal->status=1;
        $portal->update();
        echo json_encode(array('status'=>'true','message'=>'Portal Successfully Updated','reload'=>url('admin/portalManage')));
    }


    public function addQuestions($id)
    {
        $data['questions']=question_ans::where('exam_id',$id)->orderBy('exam_id','desc')->get()->toArray();
        return view('admin.addQuestions',$data);
    }

    public function addNewQuestion(Request $request)
    {
        $validator=Validator::make($request->all(),['question'=>'required','option_a'=>'required','option_b'=>'required','option_c'=>'required','option_d'=>'required','answer'=>'required']);
        if($validator->passes())
        {
            $question= new question_ans();
            $question->exam_id=$request->exam_id;
            $question->question=$request->question;
            $question->answer=$request->answer;
            $question->option_a=$request->option_a;
            $question->option_b=$request->option_b;
            $question->option_c=$request->option_c;
            $question->option_d=$request->option_d;
            $question->status=1;
            $question->save();
            $arr=array('status'=>'true','message'=>'Question Successfully Added','reload'=>url('admin/examManage'));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }


    public function questionStatus($id)
    {
       $cat=question_ans::where('id',$id)->get()->first();
        if($cat->status==1)
            $status=0;
        else
            $status=1;

        $cat1=question_ans::where('id',$id)->get()->first();
        $cat1->status=$status;
        $cat1->update();
    }

    public function deleteQuestion($id)
    {
        $std=question_ans::where('id',$id)->get()->first();
        $std->delete();
        return redirect(url('admin/addQuestions/'.$std->id));
    } 

    public function editQuestion($id)
    {
        $data['question_info']=question_ans::where('exam_id',$id)->get()->first();
        return view('admin.editQuestion',$data);
    }

    public function editQuestionSub(Request $request)
    {
        $question=question_ans::where('exam_id',$request->id)->get()->first();

        $question->exam_id=$request->exam_id;
        $question->question=$request->question;
        $question->exam_id=$request->exam_id;
        $question->answer=$request->answer;
        $question->option_a=$request->option_a;
        $question->option_b=$request->option_b;
        $question->option_c=$request->option_c;
        $question->option_d=$request->option_d;
        $question->status=1;
        
        $question->update();
        echo json_encode(array('status'=>'true','message'=>'Portal Successfully Updated','reload'=>url('admin/portalManage')));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('AdminSession');
        return redirect(url('/'));
    }

}
