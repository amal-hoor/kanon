<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(){
        $users=User::where('role_id','!=',1)->get();
        return view('admin.home',compact('users'));
    }
}
