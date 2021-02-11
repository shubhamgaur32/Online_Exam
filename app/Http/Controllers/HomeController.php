<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question_ans;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function testCal()
    {
         $data = question_ans::get();
        if(isset($_POST['next']))
        {
           
            $i = $_POST['index'];
            $score = $_POST['sc'];
            if((int)$i<count($data)-1)
            {
            $i++;
            
            $option = $_POST['option'];

            if($data[$i]['answer'] == $option)
            {
                $score = (int)$score+4;
            }
              
            return view('student.join_exam',['index'=>$i,'score'=>$score,'data'=>$data]);
        }
        else{
            return view('student.score',['score'=>$score,'total'=>count($data)*4]);
        }
        
        }
       // return view('test',['index'=>$i,'score'=>$score,'data'=>$data]);
       /* if(isset($_POST['prev']))
        {

        }*/
    }

    public function test()
    {
        $data = question_ans::get();
       // die(var_dump($data));

        return view('student.join_exam',['data'=>$data]);   
    }
}
