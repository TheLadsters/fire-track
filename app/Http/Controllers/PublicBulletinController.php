<?php

namespace App\Http\Controllers;
use \App\Models\bulletinManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PublicBulletinController extends Controller
{
    

public function getAnnouncement($bulletin_id){

    $announcements = bulletinManagement::findOrFail($bulletin_id);

    // Fetch all records
    $response['announce'] = $announcements;

    return response()->json($response);

}

/*FIREFIGHTER*/

/*POST BULLETIN*/

public function index_firefighter(){
  $allAnnouncements = bulletinManagement::all();
  return view('layouts.app', compact('allAnnouncements'));
}





/*EDIT*/




}


