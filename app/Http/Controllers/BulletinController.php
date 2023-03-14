<?php

namespace App\Http\Controllers;
use \App\Models\bulletinManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BulletinController extends Controller
{
    public function index(){
        $allAnnouncements = bulletinManagement::all();
        return view('dashboards.admin.bulletinManagement', compact('allAnnouncements'));
    }
}
