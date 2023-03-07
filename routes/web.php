<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FireAlertsController;
use App\Http\Controllers\FirefighterAlertsController;
use App\Http\Controllers\FirefighterHydrantsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FireHydrantsController;
use App\Http\Controllers\FireHydrantsTypeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    return view('home');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('editprofile',[UserController::class,'editprofile'])->name('firefighter.editprofile');
    Route::get('fire-hydrant-map', [FirefighterHydrantsController::class, 'index'])->name('firefighter.fireHydrantMap');
    Route::get('fire-hydrant-map/showMapHydrants', [FirefighterHydrantsController::class, 'showMapHydrants'])->name('firefighter.showMapHydrants');

    Route::get('/fire-alert-map', [FirefighterAlertsController::class, 'index'])->name('firefighter.fireAlertMap');
    Route::get('fire-alert-map/showMapAlerts', [FirefighterAlertsController::class, 'showMapAlerts'])->name('firefighter.showMapAlerts');

    Route::get('bulletinfirefighter',[UserController::class,'bulletinfirefighter'])->name('firefighter.bulletinfirefighter');

    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('firefighterUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('firefighterPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('firefighterChangePassword');
    
    
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    
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
    Route::get('bulletinManagement',[AdminController::class,'bulletinManagement'])->name('admin.bulletinManagement');

  
    // ADD FIRE HYDRANT TYPE ROUTES (ADMIN)
    Route::get('fire-hydrant-type-management', [FireHydrantsTypeController::class, 'index'])->name('admin.fireHTypeManagement');
    Route::get('fire-hydrant-type-management/getHydrantTypeTable', [FireHydrantsTypeController::class, 'getHydrantTypeTable']);
    Route::post('fire-hydrant-type-management/getHydrantTypeID/{hydrant_type_id}', [FireHydrantsTypeController::class, 'getHydrantTypeID']);
    Route::post('fire-hydrant-type-management/addHydrantType', [FireHydrantsTypeController::class, 'store'])->name('admin.fireHTypeAdd');
    Route::post('fire-hydrant-type-management/editHydrantType', [FireHydrantsTypeController::class, 'updateFireHydrantType'])->name('admin.fireHTypeEdit');
    Route::post('fire-hydrant-type-management/deleteHydrantType', [FireHydrantsTypeController::class, 'deleteFireHydrantType'])->name('admin.fireHTypeDelete');
    

    // USER MANAGEMENT 
    Route::post('userManagementUser/addAdminUser', [AdminController::class, 'store']);
    Route::get('userManagementUser/getUserTable', [AdminController::class, 'getUserTable']);
    Route::post('userManagementUser/getUserID/{user_id}', [AdminController::class, 'getUserID']);
    Route::post('userManagementUser/Update', [AdminController::class, 'updateUserManagement'])->name('admin.userManagementEdit');
    Route::post('userManagementUser/Delete', [AdminController::class, 'deleteUserManagement'])->name('admin.userManagementDelete');

    // REPORTS
    Route::get('userManagementUser/export_users_pdf', [AdminController::class, 'export_users_pdf'])->name('admin.export_users_pdf');
    Route::get('fire-hydrant-management/export_FH_pdf', [FireHydrantsController::class, 'export_FH_pdf'])->name('admin.export_FH_pdf');
});

// Route::get('/',function(){
//     return view('editprofile');
// });

// Route::view('upload','upload');
// Route::post('upload',[UploadController::class,'index']);



// Common Resource Routes
// index - Show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete
