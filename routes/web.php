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


Route::get('/layout', function () {
    return view('layout');
});
Route::get('/signup', function () {
    return view('signUp');
});

// sidebar routes
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

