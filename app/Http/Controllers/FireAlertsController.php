<?php

namespace App\Http\Controllers;
use \App\Models\fireAlertAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class FireAlertsController extends Controller
{
    // returns view
    public function index(){
        $allAlerts = fireAlertAdmin::all();
        return view('dashboards.admin.fireAlertManagement', compact('allAlerts'));
    }

    // show all alerts in google maps
    public function showMapAlerts(){
        $mapAlerts = fireAlertAdmin::all();
    
        // Fetch all records
        $response['alert'] = $mapAlerts;
    
        return response()->json($response);
    }

    // show all alerts in table
    public function getMapAlertTable(){
    //     $alerts = fireAlertAdmin::all();
    
    // // Fetch all records
    //  $response['data'] = $alerts;
 
    $allAlerts = DB::table('fire_alarm')
    ->join('users', 'fire_alarm.user_id', '=', 'users.user_id')
    ->select('fire_alarm.*', 'users.email')
    ->get();
    $response['data'] = $allAlerts;
    return response()->json($response);
    }

    public function getOneMapAlert($id){
        $alert = fireAlertAdmin::findOrFail($id);
        $response['data'] = $alert;
 
     return response()->json($response);
    }

    // adds a new alert in the database
    public function storeAlert(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'fire_location' => 'required'
          ]);

        if($validator->fails()) {
            $allErrors = $validator->errors();
            Alert::error('Adding the Fire Alarm was not successful.', 
            'Please fill up required fields.');
          }
        
        else{
            $formFields = $request->validate([
                'user_id' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'status' => 'required',
                'fire_location' => 'required'
            ]);
            fireAlertAdmin::create($formFields);
            Alert::success('Added Fire Alarm Successfully.');
        }
       
        return redirect('admin/fire-alert-management');
    }

    // edit a specified alert
    public function updateAlert(Request $request){

        $validator = Validator::make($request->all(), [
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'fire_location' => 'required',
            'firealarm_id' => 'required',
            'user_id' => 'required'
          ]);
        
        if($validator->fails()){
            Alert::error('Editing the Fire Alarm  was not successful.',
            'Please fill up required fields.');
        }
        
        else{
            $firealarm_id = $request->input('firealarm_id');
            $user_id = $request->input('user_id');
            $longitude = $request->input('longitude');
            $latitude = $request->input('latitude');
            $status = $request->input('status');
            $fire_location = $request->input('fire_location');
            $user_id = $request->input('user_id');
            
            $alarm = FireAlertAdmin::where('firealarm_id', $firealarm_id)->update([
                'user_id' => $user_id,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'status' => $status,
                'fire_location' => $fire_location,
            ]);
            Alert::success('Updated Fire Alarm Successfully.');

        }
       

        return redirect('admin/fire-alert-management')->with('message', 'Fire Alarm Updated Successfully.');

    }

    // Delete an alert
    public function destroyAlert(Request $request){
        $firealarm_id = $request->input('firealert_key_id');

        $fireAlert = fireAlertAdmin::find($firealarm_id);
        if($fireAlert){
            $fireAlert->delete();
            Alert::success('Fire Alarm deleted Successfully.');

        }else{
            Alert::error('Fire Alarm deletion was not successful.');
        }
        
        return redirect('admin/fire-alert-management')->with('message', 'Fire Alert Deleted Successfully.');
    }
}
