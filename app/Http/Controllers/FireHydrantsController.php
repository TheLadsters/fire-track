<?php

namespace App\Http\Controllers;
use \App\Models\fireHydrantAdmin;
use \App\Models\fireHydrantTypeAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FireHydrantsController extends Controller
{
    public function index(){
        $allHydrants = fireHydrantAdmin::all();
        return view('admin.fireHManagement', compact('allHydrants'));
    }

     // show all hydrants in google maps
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
