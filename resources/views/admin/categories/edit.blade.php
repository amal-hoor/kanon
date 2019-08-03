@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-lg-5 m-auto">
            <form  method="POST" action="{{route('category.update',$category->id)}}" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row">
                    <h2 class="text-center">انشاء فئه </h2>
                </div>
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn-dark text-white" name="submit" value="تحديث">
                </div>
            </form>

        </div>
    </div>
        @endsection