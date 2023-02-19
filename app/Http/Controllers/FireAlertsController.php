<?php

namespace App\Http\Controllers;
use \App\Models\fireAlertAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $alerts = fireAlertAdmin::all();
    
    // Fetch all records
     $response['data'] = $alerts;
 
     return response()->json($response);
    }

    // adds a new alert in the database
    public function storeAlert(Request $request){

        $formFields = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'fire_location' => 'nullable'
        ]);

        fireAlertAdmin::create($formFields);
        return redirect('/fire-alert-management');
    }

    // edit a specified alert
    public function updateAlert(Request $request){

        $firealarm_id = $request->input('firealert_hidden_id');
        $user_id = $request->input('user_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $status = $request->input('status');
        $fire_location = $request->input('fire_location');
        
        $alarm = FireAlertAdmin::where('firealarm_id', $firealarm_id)->update([
            'user_id' => $user_id,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'status' => $status,
            'fire_location' => $fire_location,
        ]);

        return redirect('/fire-alert-management')->with('message', 'Fire Alarm Updated Successfully!');

    }

    // Delete an alert
    public function destroyAlert(Request $request){
        $firealarm_id = $request->input('firealert_key_id');

        $fireAlert = fireAlertAdmin::find($firealarm_id)->delete();
        return redirect('/fire-alert-management')->with('message', 'Fire Alert Deleted Successfully!');
    }
}
