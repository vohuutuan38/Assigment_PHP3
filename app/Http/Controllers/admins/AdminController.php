<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admins.index');
    }
    public function danhmuc(){
        return view('admins.danhmuc');
    }
}
