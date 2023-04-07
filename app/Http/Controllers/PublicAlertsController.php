<?php

namespace App\Http\Controllers;
use \App\Models\fireAlertFirefighter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicAlertsController extends Controller
{
    public function index(){
        return view('layouts.app');
    }

    // show all alerts in google maps
    public function showMapAlerts(){
        $mapAlerts = fireAlertFirefighter::all();
    
        // Fetch all records
        $response['alert'] = $mapAlerts;
    
        return response()->json($response);
    }

    public function showMapAlertPublic(){
        $mapAlerts = fireAlertFirefighter::all();
    
        // Fetch all records
        $response['alert'] = $mapAlerts;
    
        return response()->json($response);
    }
}
