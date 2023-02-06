<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FireAlertAdminController extends Controller
{
    //Show all alerts
    public function index(){
        return view('admin.fireAlertManagement');
    }

    //Show only one alert
    public function show(){

    }
}
