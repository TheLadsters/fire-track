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
// use Validator;


class AdminController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_no'=>['required', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string','max:255']
        ]);
    }
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
    function addUserAdmin() {
        return view('dashboards.admin.addUserAdmin');
    }

    function userManagementUser(Request $request) {
        $users = User::all();
        return view('dashboards.admin.userManagementUser', compact('users'));  
     }


    public function getUserID($user_id){
     
            $user = User::findOrFail($user_id);
                $response['data'] = $user;
        
            return response()->json($response);
        
    }
    public function getUserTable(){
        $user = DB::table('users')
        ->select('users.*', DB::raw("CONCAT(fname, ' ', lname) as full_name"))
        ->get();
        // Fetch all records
        $response['data'] = $user;
        return response()->json($response);
    }

    public function store(Request $request)
    {
        \Log::info(json_encode($request->all()));

        $request->validate([
            'fname' => ['required', 'string', 'max:100'],
            'lname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'contact_no' => ['required', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string','max:255'],
            'gender'=> ['required','string'],
         ]);


         $user = new User();
         $user->fname = $request->fname;
         $user->lname = $request->lname;
         $user->email = $request->email;
         $user->contact_no = $request->contact_no;
         $user->gender = $request->gender;
         $user->role = 'firefighter';
         $user->address = $request->address;
         $user->img_url = "images/no_img_available.png";
         $user->password = \Hash::make($request->password);

         if( $user->save() ){
            Alert::success('Added Successfully.');
             return redirect('admin/userManagementUser');
        }

        
    }

    public function updateUserManagement(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required',
            'address' => 'required', 
            'gender' => 'required',
            'status' => 'required',
          ]);


        if($validator->fails()){
            Alert::error($validator->errors()->first());
        }else{          
            $user_id = $request->input('user_id');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $contact_no = $request->input('contact_no');
            $address = $request->input('address');
            $gender = $request->input('gender');
            $status = $request->input('status');

            $user = User::find($user_id);
            $existEmail = User::where('email',$email)->first();
            
            if(($email != $user['email']) && ($existEmail == null)){
                $user = User::where('user_id', $user_id)->update([
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'contact_no' => $contact_no,
                    'address' => $address,
                    'gender' => $gender,
                    'status' => $status
                ]);

                Alert::success('User Updated Successfully.');

            }else if(($email == $user['email']) && ($existEmail != null)){
                $user = User::where('user_id', $user_id)->update([
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'contact_no' => $contact_no,
                    'address' => $address,
                    'gender' => $gender,
                    'status' => $status
                ]);
            
                Alert::success('User Updated Successfully.');
            }else if(($email != $user['email']) && ($existEmail != null)){
                Alert::error('Email already in use.');
            }
        }
  

        return redirect('admin/userManagementUser');
    }

    public function deleteUserManagement(Request $request){
       
        $user_id = $request->input('user_id');
        
        $user = User::find($user_id);
        if($user){
            if($user->email == Auth::user()->email){
                Alert::error('Current User', 'The user you are deleting is the current logged in user.');
            }
            else{
                $user->delete();
                Alert::success('User deleted Successfully.');
            }
        
        }else
        {
            Alert::error('Deletion was not successful.');
        }

        return redirect('admin/userManagementUser')->with('message', 'User Deleted Successfully.');   
    }


}
