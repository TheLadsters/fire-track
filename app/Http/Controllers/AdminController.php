<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //
    function fireAlertManagement() {
        return view('dashboards.admin.fireAlertManagement');
    }

    function fireHManagement() {
        return view('dashboards.admin.fireHManagement');
    }

    function fireHManagementHType() {
        return view('dashboards.admin.fireHManagementHType');
    }

    function generateReport() {
        return view('dashboards.admin.generateReport');
    }

    function userManagementUser(Request $request) {
        $users = User::all();
        return view('dashboards.admin.userManagementUser', compact('users'));
     }

    function bulletinManagement() {
        return view('dashboards.admin.bulletinManagement');
    }

    public function getUserID($id){
        $user = user::findOrFail($id);
            $response['data'] = $user;
    
        return response()->json($response);
    }

    public function store(Request $request)
    {

         $request->validate([
            'username' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender'=> 'required',
         ]);

         $user = new User();
         $user->username = $request->username;
         $user->fname = $request->fname;
         $user->lname = $request->lname;
         $user->email = $request->email;
         $user->contact_no = $request->contact_no;
         $user->gender = $request->gender;
         $user->role = 'firefighter';
         $user->birthday = 03102001;
         $user->address = $request->address;
         $user->img_url = "images/no_img_available.png";
         $user->password = \Hash::make($request->password);

         if( $user->save() ){
            Alert::success('Added Successfully!');
             return redirect('admin/userManagementUser');
        }

        
    }

    public function updateUserManagement(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'contact_no' => 'required',
            'status' => 'required',
          ]);

        if($validator->fails()){
            Alert::error('Editing Fire Hydrant was not successful.', 
            'Please fill up required fields.');
        }else{
            $user_id = $request->input('user_id');
            $username = $request->input('username');
            $email = $request->input('email');
            $address = $request->input('address');
            $contact_no = $request->input('contact_no');
            $status = $request->input('status');

            $user = user::find($user_id);

                $user = user::where('user_id', $user_id)->update([
                    'user_id' => $user_id,
                    'username' => $username,
                    'email' => $email,
                    'address' => $address,
                    'contact_no' => $contact_no,
                    'status' => $status,
                ]);
            
    
            Alert::success('Updated Successfully!');
        }
  

        return redirect('admin/userManagementUser');
    }

    public function deleteUserManagement(Request $request){
        $user_id= $request->input('userid');
        
        $user = user::find($user_id);
        if($user){
        $user->delete();
        Alert::success('User deleted Successfully!');
        }else
        {
            Alert::error('Deletion was not successful.');
        }

        return redirect('admin/userManagementUser')->with('message', 'User Deleted Successfully!');   
        
    }



}
