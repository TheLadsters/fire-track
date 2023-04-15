<?php

namespace App\Http\Controllers;
use \App\Models\fireHydrantTypeAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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

                // $originalImage = $request->file('hydrant_img');
                $imagePath = $request->file('hydrant_img')->move('images' , $img = 'img_'.Str::random(15).'.jpg');
                // $imagePath = $originalImage->move(public_path().'/images/');
                
                // $imageUrl = Storage::url($imagePath);
                $model = new fireHydrantTypeAdmin;
                $model->name = $formFields['name'];
                $model->img_url = $imagePath;
                $model->save();
                // $formFields['img_url'] = $request->file('hydrant_img')->store('hydrant-types', 
                // 'public');
            }else{
                $model = new fireHydrantTypeAdmin;
                $model->name = $formFields['name'];
                $model->save();
            }

            // fireHydrantTypeAdmin::create($formFields);
            Alert::success('Added Fire Hydrant Type Successfully.');

          }

        return redirect('admin/fire-hydrant-type-management');
    }

    public function getHydrantTypeTable(){
      $hydrantType = DB::table('hydrant_type')->get();
      // Fetch all records
      $response['data'] = $hydrantType;
      
      return response()->json($response);
  }

  public function getHydrantTypeID($hydrant_type_id){
      $hydrantType = fireHydrantTypeAdmin::findOrFail($hydrant_type_id);
          $response['data'] = $hydrantType;
  
      return response()->json($response);
  }

  public function updateFireHydrantType(Request $request){

      $validator = Validator::make($request->all(), [
          'hydrant_type_id' => 'required',
          'name' => 'required',
          'img_url' => 'image|nullable|mimes:jpeg,png,jpg|max:2048',
         
        ]);

      if($validator->fails()){
          Alert::error('Editing Fire Hydrant Type was not successful.');
      }else{
          $hydrant_type_id = $request->input('hydrant_type_id');
          $name = $request->input('name');
        
          $hydrantType = fireHydrantTypeAdmin::findOrFail($hydrant_type_id);

          $hydrantImg = ($request->hasFile('img_url')) ? 
          $request->file('img_url')->move('images' , $img = 'img_'.Str::random(15).'.jpg') : $hydrantType->img_url;
  
          if($hydrantImg){
              $hydrantType = fireHydrantTypeAdmin::where('hydrant_type_id', $hydrant_type_id)->update([
                  'name' => $name,
                  'img_url' => $hydrantImg,
                  'hydrant_type_id' => $hydrant_type_id,
              ]);
          }else{
              $hydrant = fireHydrantTypeAdmin::where('hydrant_type_id', $hydrant_type_id)->update([
                  'name' => $name,
                  'hydrant_type_id' => $hydrant_type_id,
              ]);
          }
  
          Alert::success('Updated Fire Hydrant Type Successfully.');
      }


      return redirect('admin/fire-hydrant-type-management');
  }

  public function deleteFireHydrantType(Request $request){
      $hydrant_type_id = $request->input('htype_id');
      $HydrantType = fireHydrantTypeAdmin::find($hydrant_type_id);
      if($HydrantType){
      $HydrantType->delete();
      Alert::success('Fire Hydrant Type deleted Successfully.');
      }else{
          Alert::error('Fire Hydrant Type deletion was not successful.');
      }

      return redirect('admin/fire-hydrant-type-management')->with('message', 'Fire Hydrant Type Deleted Successfully.');   
  }
}
