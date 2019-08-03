<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Consult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class consultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consults=Consult::all();
        return view('admin.consults.index',compact('consults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.consults.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'question'    => 'required',
            'content'     => 'required',
            'price'       => 'required',
            'category_id' => 'required'
        ]);

        Consult::create([
            'question'    => $request->input('question'),
            'content'     => $request->input('content'),
            'price'       => $request->input('price'),
            'category_id' => $request->input('category_id')
         ]);
        flash('تم انشاء استشاره جديده .....');
        return redirect()->route('consult.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consult=Consult::find($id);
        $categories=Category::all();
        return view('admin.consults.edit',compact('consult','categories'));
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
            'question'    => 'required',
            'content'     => 'required',
            'price'       => 'required',
            'category_id' => 'required'
        ]);

        $consult=Consult::find($id);

        $consult->update([
            'question'    => $request->input('question'),
            'content'     => $request->input('content'),
            'price'       => $request->input('price'),
            'category_id' => $request->input('category_id')
        ]);

        flash('تم تعديل استشاره .....');
        return redirect()->route('consult.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consult::find($id)->delete();
        flash('تم حذف استشاره.....');
        return  back();
    }
}
