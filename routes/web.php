<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('/layoutFirefighter', function () {
//     return view('layoutFirefighter');
// });
// Route::get('/signup', function () {
//     return view('signUp');
// });

// Route::get('/firetrack', function () {
//     return view('publicuser/bulletin');
// });

// //Forgot Password

// Route::get('/email', function () {
//     return view('Forgot Password/Email');
// });
// Route::get('/otp', function () {
//     return view('Forgot Password/Otp');
// });
// Route::get('/newpassword', function () {
//     return view('Forgot Password/NewPassword');
// });
// Route::get('/confirmedpass', function () {
//     return view('Forgot Password/ConfirmedPass');
// });

// // sidebar routes admin
// Route::get('/user-management-user', function () {
//     return view('admin/userManagementUser');
// });

// Route::get('/user-management-admin', function () {
//     return view('admin/userManagementAdmin');
// });

// Route::get('/add-fire-hydrant', function () {
//     return view('admin/fireHManagementAdd');
// });

// Route::get('/fire-hydrant-type-management', function () {
//     return view('admin/fireHManagementHType');
// });

// Route::get('/fire-alert-management', function () {
//     return view('admin/fireAlertManagement');
// });


// Route::get('/generate-reports', function () {
//     return view('admin/generateReport');
// });

// Route::get('/bulletin-management', function () {
//     return view('admin/bulletinManagement');
// });



// // sidebar routes firefighter
// Route::get('/edit-profile', function () {
//     return view('firefighter/editprofile');
// });

// Route::get('/fire-hydrant-map', function () {
//     return view('firefighter/firehydrantmap');
// });

// Route::get('/fire-alert-map', function () {
//     return view('firefighter/firealertmap');
// });

// Route::get('/reports', function () {
//     return view('firefighter/reports');
// });

// Route::get('/bulletin-firefighter', function () {
//     return view('firefighter/bulletin-firefighter');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('layoutFirefighter',[App\Http\Controllers\UserController::class,'layoutFirefighter'])->name('firefighter.layoutFirefighter');
    Route::get('editprofile',[App\Http\Controllers\UserController::class,'editprofile'])->name('firefighter.editprofile');
    Route::get('firealertmap',[App\Http\Controllers\UserController::class,'firealertmap'])->name('firefighter.firealertmap');
    Route::get('firehydrantmap',[App\Http\Controllers\UserController::class,'firehydrantmap'])->name('firefighter.firehydrantmap');
    Route::get('reports',[App\Http\Controllers\UserController::class,'reports'])->name('firefighter.reports');
   
});