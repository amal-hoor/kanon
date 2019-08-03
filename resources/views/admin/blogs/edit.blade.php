@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-body">
                    @include('layouts.form_errors')
                    <form method="POST" action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h3 class="card-title">تعديل مدونه</h3>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">العنوان</label>
                                <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">المحتوي</label>
                                <textarea name="content" class="form-control">{{$blog->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">المؤلف</label>
                                <input type="text" name="blogger" class="form-control" value="{{$blog->blogger}}">
                            </div>


                            <div class="form-group">
                                <label class="control-label">الكلمات الدليليه</label>
                                <input type="text" name="tag" class="form-control" value="{{$blog->tag}}">
                            </div>

                            <div class="form-group has-success">
                                <label class="control-label">الفئه</label>
                                <select class="form-control custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($blog->category->name == $category->name) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">الصوره</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="file" name="photo_id" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        @if($blog->photo)
                                        <img src="{{asset('/images/'.$blog->photo->path)}}" width="80" height="80">
                                            @else
                                            لا توجد صوره
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="form-group col-6 m-auto">
                                <button type="submit" class="btn btn-success" style="width:100%">تعديل</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

