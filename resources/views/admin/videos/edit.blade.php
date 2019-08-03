
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-body">
                    @include('layouts.form_errors')
                    <form method="POST" action="{{route('video.update',$video->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h3 class="card-title">تعديل فيديو</h3>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">العنوان</label>
                                <input type="text" name="title" class="form-control" value="{{$video->title}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">الوصف</label>
                                <textarea name="description" class="form-control">{{$video->description}}</textarea>
                            </div>



                            <div class="form-group has-success">
                                <label class="control-label">الفئه</label>
                                <select class="form-control custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($video->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">الرابط</label>
                                <input type="text" name="url" class="form-control" value="{{$video->url}}">
                            </div>


                            <div class="form-group col-6 m-auto">
                                <button type="submit" class="btn btn-success" style="width:100%">  تعديل </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection