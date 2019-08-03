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
                                <th>السؤال</th>
                                <th>المحتوي</th>
                                <th>السعر</th>
                                <th>الفئه</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($consults as $consult)
                                <tr>
                                    <td>{{$consult->question}}</td>
                                    <td>{{$consult->content}}</td>
                                    <td>{{$consult->price}}</td>
                                    <td>{{$consult->category ? $consult->category->name : 'لا توجد فئه'}}</td>
                                    <td><a href="{{route('consult.edit',$consult->id)}}">تعديل</a></td>
                                    <td>
                                        <form method="POST" action="{{route('consult.destroy',$consult->id)}}">
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
