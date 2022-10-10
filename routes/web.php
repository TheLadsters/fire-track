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
    return view('login');
});


Route::get('/layoutFirefighter', function () {
    return view('layoutFirefighter');
});
Route::get('/signup', function () {
    return view('signUp');
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


// sidebar routes firefighter
Route::get('/edit-profile', function () {
    return view('firefighter/editprofile');
});

Route::get('/fire-hydrant-map', function () {
    return view('firefighter/firehydrantmap');
});

Route::get('/fire-alert-map', function () {
    return view('firefighter/firealertmap');
});

Route::get('/reports', function () {
    return view('firefighter/reports');
});
