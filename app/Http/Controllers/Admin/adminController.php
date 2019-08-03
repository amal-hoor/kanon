<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Role as RoleAlias;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role= Role::where('name','admin')->first();
        $admins=User::where('role_id',$role->id)->get();
        //return $admins;
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all();
        return view('admin.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        request()->validate([
            'name'    => 'required|max:255|string',
            'email'   => 'required|unique:users',
            'password'=> 'required|min:6',
            'role_id' => 'required',
            'photo_id'=>'required'
        ]);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
        }
        //'https://via.placeholder.com/150'
        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'  => $request->input('role_id'),
            'photo_id' => isset($photo) ? $photo->id : null ,
        ]);
        flash('تم اضافه ادمن....');
        return redirect()->route('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=User::find($id);
        $roles= Role::all();
        return view('admin.admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'role_id'  => 'required'
        ]);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
        }

        $admin=User::find($id);
        $admin->update([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'role_id'  => $request->input('role_id'),
            'photo_id' => isset($photo) ? $photo->id : $admin->photo_id,
        ]);
        flash('تم تحديث الادمن ......');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=User::find($id)->delete();
        flash('تم حذف الادمن ....');
        return back();
    }
}
