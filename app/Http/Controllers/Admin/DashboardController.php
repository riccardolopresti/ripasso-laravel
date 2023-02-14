<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $superUser = User::where('is_admin',1)->first();
        $users = User::where('is_admin', 0)->get();
        return view('admin.home', compact('superUser','users'));
    }
}
