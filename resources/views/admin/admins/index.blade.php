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
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>الصوره</th>
                                <th>القاعده</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>@if($admin->photo)<img  src="{{asset('/images/'.$admin->photo->path)}}" height="60" width="60">@else لا توجد صوره @endif</td>
                                    <td>{{$admin->role->name}}</td>
                                    <td><a href="{{route('admin.edit',$admin->id)}}">تعديل</a></td>
                                    <td>
                                    <form method="POST" action="{{route('admin.destroy',$admin->id)}}">
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