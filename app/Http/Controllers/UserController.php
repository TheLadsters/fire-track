<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    function editprofile(){
        return view ('dashboards.firefighter.editprofile');
    }
    function firealertmap(){
        return view ('dashboards.firefighter.firealertmap');
    }
    function firehydrantmap(){
           return view ('dashboards.firefighter.firehydrantmap');
    }
    function reports(){
        return view ('dashboards.firefighter.reports');
    }
    function bulletinfirefighter(){
        return view ('dashboards.firefighter.bulletinfirefighter');
    }

    function updateInfo(Request $request){
           
        $validator = \Validator::make($request->all(),[
            'fname'=>'required',
            'lname'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->user_id,
            'contact_no'=>'required',
            'address'=>'required',

        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->user_id)->update([
                  'fname'=>$request->fname,
                  'lname'=>$request->lname,
                  'email'=>$request->email,
                  'contact_no'=>$request->contact_no,
                  'address'=>$request->address
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
        }
}

   
}
