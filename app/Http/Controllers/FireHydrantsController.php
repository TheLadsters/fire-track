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
        return view('dashboards.admin.fireHManagement', compact('allHydrants', 'allHydrantTypes'));
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
        return redirect('admin/admin-hydrant-map');
    }

    public function updateFireHydrant(Request $request){
        $firehydrant_id = $request->input('firehydrant_hidden_id');
        $user_id = $request->input('user_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $address = $request->input('address');
        $status = $request->input('status');
        $hydrant_type = $request->input('hydrant_type_id');

        if($request->hasFile('img_url')){
            $hydrantImg = $request->file('img_url')->store('hydrant-images', 
            'public');
        }else{
            $hydrant = fireHydrantAdmin::find($firehydrant_id);
            $hydrantImg = $hydrant->img_url;
        }


        if($hydrantImg){
            $hydrant = fireHydrantAdmin::where('hydrant_id', $firehydrant_id)->update([
                'user_id' => $user_id,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'address' => $address,
                'status' => $status,
                'hydrant_type_id' => $hydrant_type,
                'img_url' => $hydrantImg
            ]);
        }else{
            $hydrant = fireHydrantAdmin::where('hydrant_id', $firehydrant_id)->update([
                'user_id' => $user_id,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'address' => $address,
                'status' => $status,
                'hydrant_type_id' => $hydrant_type,
            ]);
        }


        return redirect('admin/admin-hydrant-map')->with('message', 'Fire Hydrant Updated Successfully!');
    }

    public function deleteFireHydrant(Request $request){
        $firehydrant_id = $request->input('firehydrant_key_id');

        $fireHydrant = fireHydrantAdmin::find($firehydrant_id)->delete();
        return redirect('admin/admin-hydrant-map')->with('message', 'Fire Hydrant Deleted Successfully!');   
    }
}
