<?php

namespace App\Http\Controllers;
use \App\Models\bulletinManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BulletinController extends Controller
{
    public function index(){
        $allAnnouncements = bulletinManagement::all();
        return view('dashboards.admin.bulletinManagement', compact('allAnnouncements'));

    }

    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'author' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'article_url' => 'required',
            'image_url' => 'image|nullable|mimes:jpeg,png,jpg|max:2048'
          ]);

          if ($validator->fails()) {
            $allErrors = $validator->errors();
            dd($allErrors);
            Alert::error('Adding the Announcement was not successful.', 
            'Please fill up required fields.');
          }else{

            $formFields = $request->validate([
                'user_id' => 'required',
                'author' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'article_url' => 'required',
                'image_url' => 'image|nullable|mimes:jpeg,png,jpg|max:2048'
            ]);

            if($request->hasFile('image_url')){

                $formFields['image_url'] = $request->file('image_url')->store('public/images');
            }

            bulletinManagement::create($formFields);
            Alert::success('Added Announcement Successfully.');



          }
          
          return redirect('admin/bulletinManagement');



    }
}
