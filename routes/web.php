<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FireAlertsController;
use App\Http\Controllers\FireHydrantsController;
use App\Http\Controllers\FirefighterAlertsController;
use App\Http\Controllers\FireHydrantsTypeController;


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
    return view('login');
});


Route::get('/layoutFirefighter', function () {
    return view('layoutFirefighter');
});
Route::get('/signup', function () {
    return view('signUp');
});

Route::get('/firetrack', function () {
    return view('publicuser/bulletin');
});

//Forgot Password

Route::get('/email', function () {
    return view('Forgot Password/Email');
});
Route::get('/otp', function () {
    return view('Forgot Password/Otp');
});
Route::get('/newpassword', function () {
    return view('Forgot Password/NewPassword');
});
Route::get('/confirmedpass', function () {
    return view('Forgot Password/ConfirmedPass');
});

// sidebar routes admin
Route::get('/user-management-user', function () {
    return view('admin/userManagementUser');
});

Route::get('/user-management-admin', function () {
    return view('admin/userManagementAdmin');
});


// Routes Fire Hydrant Type Management 
Route::get('/fire-hydrant-type-management', [FireHydrantsTypeController::class, 'index']);
Route::post('/fire-hydrant-type-management/addHydrantType', [FireHydrantsTypeController::class, 'store']);


Route::get('/generate-reports', function () {
    return view('admin/generateReport');
});

Route::get('/bulletin-management', function () {
    return view('admin/bulletinManagement');
});

// Routes for Fire Hydrant Management
Route::get('/admin-hydrant-map', [FireHydrantsController::class, 'index']);

Route::get('admin-hydrant-map/showMapHydrants', [FireHydrantsController::class, 'showMapHydrants']);

Route::post('admin-hydrant-map/addFireHydrant', [FireHydrantsController::class, 'addFireHydrant']);

Route::post('admin-hydrant-map/updateFireHydrant', [FireHydrantsController::class, 'updateFireHydrant']);

Route::post('admin-hydrant-map/deleteFireHydrant', [FireHydrantsController::class, 'deleteFireHydrant']);


// Routes for fire alert management
Route::get('/fire-alert-management', [FireAlertsController::class, 'index']);

Route::get('/fire-alert-management/showMapAlerts', [FireAlertsController::class, 'showMapAlerts']);

Route::get('/fire-alert-management/getAlertTable', [FireAlertsController::class, 'getMapAlertTable']);

Route::post('/fire-alert-management/addFireAlert', [FireAlertsController::class, 'storeAlert']);

Route::delete('/fire-alert-management/deleteFireAlert', [FireAlertsController::class, 'destroyAlert']);

Route::post('/fire-alert-management/updateFireAlert', [FireAlertsController::class, 'updateAlert']);


// sidebar routes firefighter
Route::get('/edit-profile', function () {
    return view('firefighter/editprofile');
});

Route::get('/fire-hydrant-map', function () {
    return view('firefighter/firehydrantmap');
});

Route::get('/fire-alert-map', [FirefighterAlertsController::class, 'index']);
Route::get('/fire-alert-map/showMapAlerts', [FirefighterAlertsController::class, 'showMapAlerts']);

Route::get('/reports', function () {
    return view('firefighter/reports');
});

Route::get('/bulletin-firefighter', function () {
    return view('firefighter/bulletin-firefighter');
});

// Common Resource Routes
// index - Show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete
