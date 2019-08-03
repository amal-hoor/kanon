<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request){
        $user=User::where('email',$request->input('email'))->first();

        if($user){
            if(Hash::check(request('password'),$user->password)) {

                if (Auth::Attempt(request(['email', 'password']))) {

                    return redirect()->route('admin.home');

                } else {

                    flash('هناك شئ خاطئ');
                    return back();
                }
            }

                flash('الباسوورد خطأ');
                return back();
            }

        flash('الايميل خطأ');
        return back();
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
