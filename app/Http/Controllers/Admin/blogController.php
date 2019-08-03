<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.blogs.create',compact('categories'));
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
            'title' => 'required',
            'content' => 'required',
            'tag' => 'required',
            'blogger' => 'required',
            'category_id' => 'required',
        ]);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
        }

        blog::create([
            'title'       => $request->input('title'),
            'content'     => $request->input('content'),
            'tag'         => $request->input('tag'),
            'blogger'     => $request->input('blogger'),
            'category_id' => $request->input('category_id'),
            'photo_id'    => isset($photo) ? $photo->id : null,
        ]);
        flash('تم انشاء مدونه جديده....');
        return redirect()->route('blog.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $blog=Blog::find($id);
        return view('admin.blogs.edit',compact('categories','blog'));
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
            'title' => 'required',
            'content' => 'required',
            'tag' => 'required',
            'blogger' => 'required',
            'category_id' => 'required',
        ]);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
        }
       $blog=Blog::find($id);
        $blog->update([
            'title'       => $request->input('title'),
            'content'     => $request->input('content'),
            'tag'         => $request->input('tag'),
            'blogger'     => $request->input('blogger'),
            'category_id' => $request->input('category_id'),
            'photo_id'    => isset($photo) ? $photo->id : $blog->photo_id,
        ]);
        flash('تم تعديل المدونه ......');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        flash('تم حذف مدونه......');
        return back();
    }
}
