<?php

namespace App\Http\Controllers;
use \App\Models\fireAlertFirefighter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirefighterAlertsController extends Controller
{
    // show all alerts in google maps
    public function index(){
        return view('firefighter.firealertmap');
    }

    // show all alerts in google maps
    public function showMapAlerts(){
        $mapAlerts = fireAlertFirefighter::all();
    
        // Fetch all records
        $response['alert'] = $mapAlerts;
    
        return response()->json($response);
    }
}
