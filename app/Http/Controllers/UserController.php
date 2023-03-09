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
            'username'=>'required',
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
                  'username'=>$request->username,
                  'fname'=>$request->fname,
                  'lname'=>$request->lname,
                  'address'=>$request->address,
                  'contact_no'=>$request->contact_no,
                  'email'=>$request->email                  
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
                // Alert::success('Your profile info has been updated successfully.');
    
    
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
        $path = 'storage/users/images/';
        $file = $request->file('img_url');
        $new_name = 'storage/users/images/UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->user_id)->getAttributes()['img_url'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->user_id)->update(['img_url'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return redirect('user/editprofile');
                Alert::success('Profile picture changed successfully.');
            }
        }
           
        }
        
        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required',
        //     'img_url' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);

        // if($validator->fails()){
        //     Alert::error('failed');
        // }else{
      
        //     $user_id = $request->input('user_id');
           
        //     $user = User::find($user_id);

        //     $userImg = ($request->hasFile('img_url')) ? 
        //     $request->file('img_url')->store('users', 'public') : $user->img_url;
    
        //     if($userImg){
        //         $user = User::where('user_id', $user_id)->update([
        //             'user_id' => $user_id,
        //             'img_url' => $userImg
        //         ]);
        //     }
    
        //     Alert::success('Profile picture changed successfully');
        // }
  

        // return redirect('user/editprofile');
    
    
}
