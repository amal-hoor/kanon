@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                @include('flash::message')
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>المؤلف</th>
                                <th>المحتوي</th>
                                <th>الكلمات الدليليه</th>
                                <th>الفئه</th>
                                <th>الصوره</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->blogger}}</td>
                                    <td>{{$blog->content}}</td>
                                    <td>{{$blog->tag}}</td>
                                    <td>{{$blog->category ? $blog->category ->name : 'لا توجد فئه'}}</td>
                                    <td>@if($blog->photo)<img src="{{asset('/images/'.$blog->photo->path)}}" width="60" height="60">@else 'no image' @endif</td>
                                    <td><a href="{{route('blog.edit',$blog->id)}}">تعديل</a></td>
                                    <td>
                                        <form method="POST" action="{{route('blog.destroy',$blog->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection