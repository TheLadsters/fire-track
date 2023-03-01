<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function index(Request $request)
    {
        $new_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->store('public/images');

        $query = User::find(Auth::user()->user_id)->update([
            'img_url'=>$new_name                
       ]);

        return $new_name;
        // return $req->file('file')->store('public/images');
    }
}
