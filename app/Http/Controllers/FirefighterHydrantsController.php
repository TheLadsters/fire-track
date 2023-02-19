<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\fireHydrantFirefighter;
use Illuminate\Support\Facades\DB;


class FirefighterHydrantsController extends Controller
{
    // show all hydrants on google maps
    public function index(){
        return view('dashboards.firefighter.firehydrantmap');
    }

    // show all alerts in google maps
    public function showMapHydrants(){
        $allHydrants = DB::table('hydrant')
        ->join('hydrant_type', 'hydrant.hydrant_type_id', '=', 'hydrant_type.hydrant_type_id')
        ->select('hydrant.*', 'hydrant_type.name')
        ->get();
        // Fetch all records
        $response['hydrant'] = $allHydrants;
    
        return response()->json($response);
    }
}
