<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=Video::all();
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.videos.create',compact('categories'));
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
            'video_title' => 'required',
            'video_description' => 'required',
            'video_url' => 'required',
            'category_id' => 'required'
        ]);

        $count=$request->input('videos_number');
        //return $request->all();

        for($i=0 ; $i < $count ; $i++){
            $url=$request->input('video_url')[$i];
            $url=explode('?v=',$url);
           // dd ($url[1]);
            Video::create([
                'title' =>  $request->input('video_title')[$i],
                'description' =>  $request->input('video_description')[$i],
                'url' =>  'https://www.youtube.com/embed/'.$url[1],
                'category_id' => $request->input('category_id')
            ]);

        }

        return redirect()->route('video.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video=Video::find($id);
        $categories=Category::all();
        return view('admin.videos.edit',compact('categories','video'));
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
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'required',
            'category_id' => 'required'
        ]);

        $url=$request->input('url');
        //$url=explode('?v=',$url);
        //return $url;
        $video=Video::find($id);

        $video->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'url'         => 'https://www.youtube.com/embed/'.$url,
            'category_id' => $request->input('category_id'),
        ]);
        flash('تم تعديل الفيديو.....');
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::find($id)->delete();
        flash('تم حذف الفيديو.....');
        return back();
    }
}
