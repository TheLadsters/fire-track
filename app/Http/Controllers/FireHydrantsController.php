<?php

namespace App\Http\Controllers;
use \App\Models\fireHydrantAdmin;
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
        $mapHydrants = fireHydrantAdmin::all();
    
        // Fetch all records
        $response['hydrant'] = $mapHydrants;
    
        return response()->json($response);
    }
}
