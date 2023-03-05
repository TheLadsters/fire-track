<?php

namespace App\Http\Controllers;
use \App\Models\fireHydrantTypeAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


class FireHydrantsTypeController extends Controller
{
    public function index(){
        $allHydrantTypes = fireHydrantTypeAdmin::all();
        return view('dashboards.admin.fireHManagementHType', compact('allHydrantTypes'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required'
          ]);

          if($validator->fails()){
            $allErrors = $validator->errors();
            Alert::error('Adding the new Fire Hydrant Type was not successful.', 
            'Please fill up name field.');
          }

          else{

            $formFields = $request->validate([
                'name' => 'required'
            ]);

            if($request->hasFile('hydrant_img')){
                $formFields['img_url'] = $request->file('hydrant_img')->store('hydrant-types', 
                'public');
            }

            fireHydrantTypeAdmin::create($formFields);
            Alert::success('Added Fire Hydrant Type Successfully!');

          }

        return redirect('admin/fire-hydrant-type-management');
    }
}
