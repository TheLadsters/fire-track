<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


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
            'address'=>'required', 
            'contact_no'=>'required',
            'email'=> 'required|email|',
             

        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->user_id)->update([
                  'fname'=>$request->fname,
                  'lname'=>$request->lname,
                  'address'=>$request->address,
                  'contact_no'=>$request->contact_no,
                  'email'=>$request->email                  
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                return response()->json(['status'=>1,'msg'=>'Your profile info has been updated successfully.']);
             }
        }
    }

    function changePassword(Request $request){
        //Validate form
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
             ],
             'newpassword'=>'required|min:8|max:30',
             'cnewpassword'=>'required|same:newpassword'
         ],[
             'oldpassword.required'=>'Enter your current password',
             'oldpassword.min'=>'Old password must have atleast 8 characters',
             'oldpassword.max'=>'Old password must not be greater than 30 characters',
             'newpassword.required'=>'Enter new password',
             'newpassword.min'=>'New password must have atleast 8 characters',
             'newpassword.max'=>'New password must not be greater than 30 characters',
             'cnewpassword.required'=>'ReEnter your new password',
             'cnewpassword.same'=>'New password and Confirm new password must match'
         ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             
         $update = User::find(Auth::user()->user_id)->update(['password'=>\Hash::make($request->newpassword)]);

         if( !$update ){
             return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
         }else{
             return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
         }
        }
    }

    function updatePicture(Request $request){
        
        $request->validate([
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        $path = $request->file('img_url')->store('public/users/images');
        $path = str_replace('public/', '', $path); // Remove the "public/" prefix from the path
    
        $user->img_url = $path;

        $user->save();

        Alert::success('Your profile picture has been updated.');
        
        return redirect('user/editprofile');
        

       
        
    }
}
