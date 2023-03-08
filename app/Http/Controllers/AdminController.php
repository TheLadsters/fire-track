<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
use PDF;

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
         $user->role = 'admin';
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
            'user_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required',
            'address' => 'required', 
            'gender' => 'required',
            'status' => 'required'
          ]);

        if($validator->fails()){
            Alert::error('Not successful');
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
            
    
            Alert::success('Updated Successfully!');
        }
  

        return redirect('admin/userManagementUser');
    }

    public function deleteUserManagement(Request $request){
       
        $user_id = $request->input('user_id');
        
        $user = User::find($user_id);
        if($user){
        $user->delete();
        Alert::success('User deleted Successfully!');
        }else
        {
            Alert::error('Deletion was not successful.');
        }

        return redirect('admin/userManagementUser')->with('message', 'User Deleted Successfully!');   
    }

    public function export_users_pdf(){

        $users = User::all();
        // $pdf = Pdf::loadView('pdf.users',   [
        //     'users'=>$users
        // ]);
        // return $pdf->download('users.pdf');
        view()->share('users',$users);
        $pdf = PDF::loadView('pdf.Users', [
            'users'=>$users
        ]);
        // download PDF file with download method
        return $pdf->download('users.pdf');
        
    }


}
