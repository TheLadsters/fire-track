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

    // public function getUserID($user_id){
    //     $user =  User::whereuser_id($user_id)->first();

    //     if(!$user){
    //         return back()->with('error', 'User Not Found');
    //     }

    //     return view('modals.userManagementEdit')->with([
    //         'user' => $user
    //     ]);
    //     // return view('dashboards.admin.userManagementUser')->with([
    //     //     'user' => $user
    //     // ]);
    // }

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

    public function updateUserManagement(Request $request, $user_id){

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required', 
            'contact_no' => 'required',
            'status' => 'required',
        ]); 
         
        try {
              DB::beginTransaction();
             // Logic For Save User Data
  
             $update_user = User::where('user_id', $user_id)->update([
                 'username' => $request->username,
                'email' => $request->email,
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'status' => $request->status,
            ]);

            if(!$update_user){
                DB::rollBack();

                Alert::error('Not Successful!');
            }

            DB::commit();
            Alert::success('Updated Successfully!');
            return redirect('admin/userManagementUser');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function deleteUserManagement($user_id){
       
        try {
            DB::beginTransaction();

            $delete_user = User::whereuser_id($user_id)->delete();

            if(!$delete_user){
                DB::rollBack();
                Alert::error('Deletion was not successful.');
            }

            DB::commit();
            Alert::success('User deleted Successfully!');
            return redirect('admin/userManagementUser')->with('message', 'User Deleted Successfully!'); 


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
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
