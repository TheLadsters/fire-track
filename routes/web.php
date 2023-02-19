<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FireAlertsController;
use App\Http\Controllers\FirefighterAlertsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FireHydrantsController;
use App\Http\Controllers\FireHydrantsTypeController;
use Illuminate\Support\Facades\Auth;


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


// Routes Fire Hydrant Type Management (ADMIN)
Route::get('/fire-hydrant-type-management', [FireHydrantsTypeController::class, 'index']);

Route::post('/fire-hydrant-type-management/addHydrantType', [FireHydrantsTypeController::class, 'store']);


// Routes for Fire Hydrant Management (ADMIN)
Route::get('/admin-hydrant-map', [FireHydrantsController::class, 'index']);

Route::get('/admin-hydrant-map/showMapHydrants', [FireHydrantsController::class, 'showMapHydrants']);

Route::post('/admin-hydrant-map/addFireHydrant', [FireHydrantsController::class, 'addFireHydrant']);

Route::post('/admin-hydrant-map/updateFireHydrant', [FireHydrantsController::class, 'updateFireHydrant']);

Route::post('/admin-hydrant-map/deleteFireHydrant', [FireHydrantsController::class, 'deleteFireHydrant']);


// Routes for fire alert management (ADMIN)
Route::get('/fire-alert-management', [FireAlertsController::class, 'index']);

Route::get('/fire-alert-management/showMapAlerts', [FireAlertsController::class, 'showMapAlerts']);

Route::get('/fire-alert-management/getAlertTable', [FireAlertsController::class, 'getMapAlertTable']);

Route::post('/fire-alert-management/addFireAlert', [FireAlertsController::class, 'storeAlert']);

Route::delete('/fire-alert-management/deleteFireAlert', [FireAlertsController::class, 'destroyAlert']);

Route::post('/fire-alert-management/updateFireAlert', [FireAlertsController::class, 'updateAlert']);


// Routes for firefighter hydrant map (FIREFIGHTER)
Route::get('/fire-hydrant-map', [FirefighterHydrantsController::class, 'index']);
Route::get('/fire-hydrant-map/showMapHydrants', [FirefighterHydrantsController::class, 'showMapHydrants']);


//FIREFIGHTER FIRE ALERT MAP
Route::get('/fire-alert-map', [FirefighterAlertsController::class, 'index']);
Route::get('/fire-alert-map/showMapAlerts', [FirefighterAlertsController::class, 'showMapAlerts']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('editprofile',[UserController::class,'editprofile'])->name('firefighter.editprofile');
    Route::get('firehydrantmap',[UserController::class,'firehydrantmap'])->name('firefighter.firehydrantmap');
    Route::get('firealertmap',[UserController::class,'firealertmap'])->name('firefighter.firealertmap');
    Route::get('reports',[UserController::class,'reports'])->name('firefighter.reports');
    Route::get('bulletinfirefighter',[UserController::class,'bulletinfirefighter'])->name('firefighter.bulletinfirefighter');

    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('firefighterUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('firefighterPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('firefighterChangePassword');
    
    
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('fireAlertManagement',[AdminController::class,'fireAlertManagement'])->name('admin.fireAlertManagement');
    // Route::get('fireHManagement',[AdminController::class,'fireHManagement'])->name('admin.fireHManagement');
    // Route::get('fireHManagementHType',[AdminController::class,'fireHManagementHType'])->name('admin.fireHManagementHType');
    Route::get('generateReport',[AdminController::class,'generateReports'])->name('admin.generateReport');
    Route::get('userManagementAdmin',[AdminController::class,'userManagementAdmin'])->name('admin.userManagementAdmin');
    Route::get('userManagementUser',[AdminController::class,'userManagementUser'])->name('admin.userManagementUser');
    Route::get('bulletinManagement',[AdminController::class,'bulletinManagement'])->name('admin.bulletinManagement');

});



// Common Resource Routes
// index - Show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete
