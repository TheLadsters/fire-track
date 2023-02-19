<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    //
    function fireAlertManagement() {
        return view('dashboards.admin.fireAlertManagement');
    }

    function fireHManagement() {
        return view('dashboards.admin.fireHManagement');
    }

    function fireHManagementHType() {
        return view('dashboards.admin.fireHManagementHType');
    }

    function generateReport() {
        return view('dashboards.admin.generateReport');
    }

    function userManagementAdmin() {
        return view('dashboards.admin.userManagementAdmin');
    }

    function userManagementUser() {
        return view('dashboards.admin.userManagementUser');
    }

    function bulletinManagement() {
        return view('dashboards.admin.bulletinManagement');
    }
}
