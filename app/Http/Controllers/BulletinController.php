<?php

namespace App\Http\Controllers;
use \App\Models\bulletinManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BulletinController extends Controller
{
  public function index() {
    // Fetch all announcements from the database and order them by ID in descending order (latest first)
    $allAnnouncements = bulletinManagement::orderBy('bulletin_id', 'desc')->get();

    return view('dashboards.admin.bulletinManagement', compact('allAnnouncements'));
}

    public function index_public(){
      $allAnnouncements = bulletinManagement::all();
      return view('layouts.app', compact('allAnnouncements'));

  }


/* Add Announcement*/

    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'author_name' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'article_url' => 'required',
            'img_url' => 'required'
          ]);

          if ($validator->fails()) {
            $allErrors = $validator->errors();
            // dd($allErrors);
            Alert::error('Adding the Announcement was not successful.', 
            'Please fill up required fields.');
          }else{

            $formFields = $request->validate([
                'user_id' => 'required',
                'author_name' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'article_url' => 'required',
                'img_url' => 'required'
            ]);

            if($request->hasFile('img_url')){

                $formFields['img_url'] = $request->file('img_url')->move('images/announcementIMG' , $img = 'img_'.Str::random(15).'.jpg');

            }

            bulletinManagement::create($formFields);
            Alert::success('Added Announcement Successfully.');



          }
          
          return redirect('admin/bulletinManagement');
    }


/* Edit Announcement*/

public function edit(Request $request) {
  // Check if the required fields are present in the request
  $request->validate([
      'user_id' => 'required',
      'author_name' => 'required',
      'title' => 'required',
      'summary' => 'required',
      'article_url' => 'required',
      'bulletin_id' => 'required',
  ]);

  $bulletin_id = $request->input('bulletin_id');
  $user_id = $request->input('user_id');
  $author_name = $request->input('author_name');
  $title = $request->input('title');
  $summary = $request->input('summary');
  $article_url = $request->input('article_url');

  // Initialize $formFields array
  $formFields = [];

  if ($request->hasFile('img_url')) {
      $formFields['img_url'] = $request->file('img_url')->move('images/announcementIMG', 'img_' . Str::random(15) . '.jpg');
  }

  // Check if the bulletin with the given ID exists before updating
  $bulletin = bulletinManagement::find($bulletin_id);

  if ($bulletin) {
      // Update the bulletin fields
      $bulletin->update([
          'user_id' => $user_id,
          'author_name' => $author_name,
          'title' => $title,
          'summary' => $summary,
          'article_url' => $article_url,
          'img_url' => isset($formFields['img_url']) ? $formFields['img_url'] : $bulletin->img_url // Use the existing img_url if no new image is uploaded
      ]);

      Alert::success('Updated Bulletin Successfully.');
  } else {
      // Handle the case where the bulletin with the given ID does not exist
      Alert::error('Bulletin not found.', 'Please check the provided bulletin ID.');
  }

  return redirect('admin/bulletinManagement');
}

/* Delete announcement */

   public function delete(Request $request){
    $bulletin_id = $request->input('bulletin_id');

    $bulletin = bulletinManagement::find($bulletin_id);
    if($bulletin){
      $bulletin->delete();
    Alert::success('Announcement deleted Successfully.');
    
    }else
    {
        Alert::error('Announcement deletion was not successful.');
    }

    return redirect('admin/bulletinManagement')->with('message', 'Announcement Deleted Successfully.');   
}



public function getAnnouncement($bulletin_id){

    $announcements = bulletinManagement::findOrFail($bulletin_id);

    // Fetch all records
    $response['announce'] = $announcements;

    return response()->json($response);

}

/*FIREFIGHTER*/

/*POST BULLETIN*/

public function index_firefighter(){

  $allAnnouncements = bulletinManagement::orderBy('bulletin_id', 'desc')->get();

  return view('dashboards.firefighter.bulletinfirefighter', compact('allAnnouncements'));

  // $allAnnouncements = bulletinManagement::all();
  // return view('dashboards.firefighter.bulletinfirefighter', compact('allAnnouncements'));
}

/*ADD ANNOUNCEMENT*/

public function add_firefighter(Request $request){

  $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'author_name' => 'required',
      'title' => 'required',
      'summary' => 'required',
      'article_url' => 'required',
      'img_url' => 'required'
    ]);

    if ($validator->fails()) {
      $allErrors = $validator->errors();
      // dd($allErrors);
      Alert::error('Adding the Announcement was not successful.', 
      'Please fill up required fields.');
    }else{

      $formFields = $request->validate([
          'user_id' => 'required',
          'author_name' => 'required',
          'title' => 'required',
          'summary' => 'required',
          'article_url' => 'required',
          'img_url' => 'required'
      ]);

      // if($request->hasFile('img_url')){

      //     $formFields['img_url'] = $request->file('img_url')->store('public/images');
      // }

      bulletinManagement::create($formFields);
      Alert::success('Added Announcement Successfully.');



    }
    
    return redirect('firefighter/bulletinfirefighter');
}



public function getBulletinTable(){


  $allAlerts = DB::table('bulletin')
  ->join('users', 'bulletin.user_id', '=', 'users.user_id')
  ->select('bulletin.*', 'users.email')
  ->get();
  $response['data'] = $allAlerts;
  return response()->json($response);
  }









}


