<?php

namespace App\Http\Controllers;
use \App\Models\fireHydrantTypeAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;


class FireHydrantsTypeController extends Controller
{
    public function index(){
        $allHydrantTypes = fireHydrantTypeAdmin::all();
        return view('admin.fireHManagementHType', compact('allHydrantTypes'));
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required'
        ]);
        if($request->hasFile('hydrant_img')){
            $formFields['img_url'] = $request->file('hydrant_img')->store('hydrant-types', 
            'public');
        }

        fireHydrantTypeAdmin::create($formFields);

        return redirect('/fire-hydrant-type-management')->with('message', 'Fire Hydrant Type created successfully!');
    }
}
