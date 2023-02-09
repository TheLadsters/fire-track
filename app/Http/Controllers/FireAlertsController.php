<?php

namespace App\Http\Controllers;
use \App\Models\fireAlertAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FireAlertsController extends Controller
{
    // returns view
    public function index(){
        return view('admin.fireAlertManagement');
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
}