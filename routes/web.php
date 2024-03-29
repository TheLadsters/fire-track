<?php

use App\Http\Controllers\PublicAlertsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FireAlertsController;
use App\Http\Controllers\FirefighterAlertsController;
use App\Http\Controllers\FirefighterHydrantsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FireHydrantsController;
use App\Http\Controllers\FireHydrantsTypeController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\FirefighterBulletinController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function (Request $request) {
     // Invalidate the current session
     Session::invalidate();

     // Regenerate the session ID
     Session::regenerate();
    $request->session()->flush();        
    return view('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');
// Route::get('/landing/fire-alert-map/showMapAlerts', [FirefighterAlertsController::class, 'showMapAlerts']);
Route::get('/fire-alert-map', [PublicAlertsController::class, 'index']);
Route::get('/fire-alert-map/showMapAlerts', [PublicAlertsController::class, 'showMapAlertPublic']);
Route::get('/bulletinfirefighter', [PublicBulletinController::class, 'index_firefighter']);

Route::get('', [BulletinController::class, 'index_public']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('editprofile',[UserController::class,'editprofile'])->name('firefighter.editprofile');
    Route::get('fire-hydrant-map', [FirefighterHydrantsController::class, 'index'])->name('firefighter.fireHydrantMap');
    Route::get('fire-hydrant-map/showMapHydrants', [FirefighterHydrantsController::class, 'showMapHydrants'])->name('firefighter.showMapHydrants');

    Route::get('/fire-alert-map', [FirefighterAlertsController::class, 'index'])->name('firefighter.fireAlertMap');
    Route::get('fire-alert-map/showMapAlerts', [FirefighterAlertsController::class, 'showMapAlerts'])->name('firefighter.showMapAlerts');

    Route::get('/bulletinfirefighter',[FirefighterBulletinController::class,'bulletinfirefighter'])->name('firefighter.bulletinfirefighter');

    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('firefighterUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('firefighterPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('firefighterChangePassword');
    
    Route::get('bulletinfirefighter', [BulletinController::class, 'index_firefighter'])->name('firefighter.bulletinfirefighter');
    Route::post('firefighter/addAnnouncementFirefighter',[BulletinController::class, 'add_firefighter'])->name('firefighter.addAnnouncementFirefighter');
    Route::get('bulletinManagement', [BulletinController::class, 'index'])->name('firefighter.bulletinManagement');
    Route::post('bulletinManagement/editAnnoucementFirefighter',[BulletinController::class, 'edit'])->name('firefighter.editAnnoucementFirefighter');
    Route::post('bulletinManagement/deleteAnnoucementFirefighter', [BulletinController::class, 'delete'])->name('firefighter.deleteAnnoucementFirefighter');
});
    

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin']], function(){
    
    // ROUTE FOR HYDRANT MAP MANAGER (ADMIN)
    Route::get('admin-hydrant-map', [FireHydrantsController::class, 'index'])->name('admin.fireHManagement');
    Route::get('admin-hydrant-map/showMapHydrants', [FireHydrantsController::class, 'showMapHydrants'])->name('admin.showMapHydrants');
    Route::get('admin-hydrant-map/getHydrantTable', [FireHydrantsController::class, 'getHydrantTable']);
    Route::post('admin-hydrant-map/getOneMapHydrant/{id}', [FireHydrantsController::class, 'getOneMapHydrant']);
    Route::post('admin-hydrant-map/addFireHydrant', [FireHydrantsController::class, 'addFireHydrant'])->name('admin.addFireHydrant');
    Route::post('admin-hydrant-map/updateFireHydrant', [FireHydrantsController::class, 'updateFireHydrant'])->name('admin.editFireHydrant');
    Route::post('admin-hydrant-map/deleteFireHydrant', [FireHydrantsController::class, 'deleteFireHydrant'])->name('admin.deleteFireHydrant');

    // ROUTE FOR FIRE ALERT MANAGER (ADMIN)
    Route::get('fire-alert-management', [FireAlertsController::class, 'index'])->name('admin.fireAlertManagement');
    Route::get('fire-alert-management/showMapAlerts', [FireAlertsController::class, 'showMapAlerts'])->name('admin.showMapAlerts');
    Route::get('fire-alert-management/getAlertTable', [FireAlertsController::class, 'getMapAlertTable'])->name('admin.getAlertTable');
    Route::post('fire-alert-management/getOneMapAlert/{id}', [FireAlertsController::class, 'getOneMapAlert']);
    Route::post('fire-alert-management/addFireAlert', [FireAlertsController::class, 'storeAlert'])->name('admin.addFireAlert');
    Route::delete('fire-alert-management/deleteFireAlert', [FireAlertsController::class, 'destroyAlert'])->name('admin.deleteFireAlert');
    Route::post('fire-alert-management/updateFireAlert', [FireAlertsController::class, 'updateAlert'])->name('admin.editFireAlert');

    // Route::get('userManagementAdmin',[AdminController::class,'userManagementAdmin'])->name('admin.userManagementAdmin');
    Route::get('userManagementUser',[AdminController::class,'userManagementUser'])->name('admin.userManagementUser');
    Route::get('addUserAdmin',[AdminController::class,'addUserAdmin'])->name('admin.addUserAdmin');

  
    // ADD FIRE HYDRANT TYPE ROUTES (ADMIN)
    Route::get('fire-hydrant-type-management', [FireHydrantsTypeController::class, 'index'])->name('admin.fireHTypeManagement');
    Route::get('fire-hydrant-type-management/getHydrantTypeTable', [FireHydrantsTypeController::class, 'getHydrantTypeTable']);
    Route::post('fire-hydrant-type-management/getHydrantTypeID/{hydrant_type_id}', [FireHydrantsTypeController::class, 'getHydrantTypeID']);
    Route::post('fire-hydrant-type-management/addHydrantType', [FireHydrantsTypeController::class, 'store'])->name('admin.fireHTypeAdd');
    Route::post('fire-hydrant-type-management/editHydrantType', [FireHydrantsTypeController::class, 'updateFireHydrantType'])->name('admin.fireHTypeEdit');
    Route::delete('fire-hydrant-type-management/deleteHydrantType', [FireHydrantsTypeController::class, 'deleteFireHydrantType'])->name('admin.fireHTypeDelete');
    

    // USER MANAGEMENT 
    Route::post('userManagementUser/addAdminUser', [AdminController::class, 'store'])->name('admin.addAdminUser');;
    Route::get('userManagementUser/getUserTable', [AdminController::class, 'getUserTable']);
    Route::post('userManagementUser/getUserID/{user_id}', [AdminController::class, 'getUserID']);
    Route::post('userManagementUser/Update', [AdminController::class, 'updateUserManagement'])->name('admin.userManagementEdit');
    Route::post('userManagementUser/Delete', [AdminController::class, 'deleteUserManagement'])->name('admin.userManagementDelete');

    // BULLETIN MANAGEMENT
    // Route::get('bulletinManagement',[AdminController::class,'bulletinManagement'])->name('admin.bulletinManagement');
    Route::get('bulletinManagement', [BulletinController::class, 'index'])->name('admin.bulletinManagement');
    Route::post('bulletinManagement/addAnnouncement',[BulletinController::class, 'add'])->name('admin.addAnnouncement');
    Route::post('bulletinManagement/editAnnouncement',[BulletinController::class, 'edit'])->name('admin.editAnnouncement');
    Route::post('bulletinManagement/deleteAnnouncement', [BulletinController::class, 'delete'])->name('admin.deleteAnnouncement');
    Route::get('bulletinManagement/getBulletinTable', [BulletinController::class, 'getBulletinTable'])->name('admin.getBulletinTable');
    Route::post('bulletinManagement/getAnnouncement/{bulletin_id}', [BulletinController::class, 'getAnnouncement'])->name('admin.getAnnouncement');
});
   




// Common Resource Routes
// index - Show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete
