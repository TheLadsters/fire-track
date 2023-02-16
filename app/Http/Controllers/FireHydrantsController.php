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
        $allHydrantTypes = fireHydrantTypeAdmin::all();
        return view('admin.fireHManagement', compact('allHydrants', 'allHydrantTypes'));
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

    public function addFireHydrant(Request $request){
        $formFields = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
            'hydrant_type_id' => 'required',
            'address' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'img_url' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('img_url')){
            $formFields['img_url'] = $request->file('img_url')->store('hydrant-images', 
            'public');
        }
    
        fireHydrantAdmin::create($formFields);
        return redirect('/admin-hydrant-map');
    }

    public function updateFireHydrant(){

    }
}
