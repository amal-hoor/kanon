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
                                <th>الفيديو</th>
                                <th>الوصف</th>
                                <th>الفئه</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{$video->title}}</td>
                                    <td><iframe width="200" height="200" src="{{$video->url}}" allowfullscreen></iframe></td>
                                    <td>{{$video->description}}</td>
                                    <td>{{$video->category->name}}</td>
                                    <td><a href="{{route('video.edit',$video->id)}}">تعديل</a></td>
                                    <td>
                                        <form method="POST" action="{{route('video.destroy',$video->id)}}">
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