<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\portal;
use Validator;
use Session; 

class PortalController extends Controller
{
    public function portalSignup()
    {
        if(Session::get('portalSession'))
        {
            return redirect('portal/dashboard');
        }
        return view('portal.signup');
    }

    public function signupSub(Request $request)
    {
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes())
        {
            $is_exists= portal::where('email',$request->email)->get()->toArray();
            if($is_exists)
            {
                $arr=array('status'=>'false','message'=>'Email Already Registered');
            }
            else
            {
                $portal = new portal();
                $portal->name=$request->name;
                $portal->email=$request->email;
                $portal->mobile_no=$request->mobile_no;
                $portal->password=$request->password;
                //$portal->status=1;
                $portal->save();
                $arr=array('status'=>'true','message'=>'Portal Successfully Added','reload'=>url('portal/login'));
            
            }
            }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }


    public function login()
    {
        if(Session::get('portalSession'))
        {
            return redirect('portal/dashboard');
        }
        return view('portal.login');
    }


    public function loginSub(Request $request)
    {
        $portal=portal::where('email',$request->email)->where('password',$request->password)->get()->toArray();
        if($portal)
        {
            if($portal[0]['status']==1)
            {
                $request->session()->put('portalSession',$portal[0]['id']);
                $arr=array('status'=>'true','message'=>'Success','reload'=>url('portal/dashboard'));
            }
            else
            {
                $arr=array('status'=>'false','message'=>'Your account deactivated');
            }
        }
        else
        {
            $arr=array('status'=>'false','message'=>'Email or Password Incorrect');
        }
        echo json_encode($arr);
    }
}
