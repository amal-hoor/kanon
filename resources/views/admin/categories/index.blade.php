@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-lg-5 m-auto">
            <form  method="POST" action="{{route('category.store')}}" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <h2 class="text-center">انشاء فئه </h2>
                </div>
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" class="form-control" name="name" placeholder="ادخل الاسم.....">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn-dark text-white" name="submit" value="انشاء فئه">
                </div>
            </form>

        </div>

        <div class="col-lg-6 m-auto">
            <div class="mt-1">
                @include('flash::message')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">جميع الفئات</h4>
                    <div class="table-responsive">
                        <table class="table color-table dark-table text-white">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>وقت الانشاء</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>


                            <tbody>


                            @if($categories)

                                @foreach ($categories as $category)
                                    <tr>

                                        <td> <a href="#"> {{$category->name}}</a></td>
                                        <td>{{$category->created_at ? $category->created_at->diffForhumans() : 'No Date'}}</td>
                                        <td><a href="{{route('category.edit',$category->id)}}">تعديل</a></td>
                                        <td>
                                            <form action="{{route('category.destroy',$category->id)}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="حذف" class="btn btn-link">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
        <!-- END PAGE BASE CONTENT -->


@endsection

