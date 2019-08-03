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
                                <th>الحاله</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->photo)<img  src="{{asset('/images/'.$user->photo->path)}}" height="60" width="60">@else لا توجد صوره @endif</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        @if($user->block == 1)
                                            <form action="{{route('user.block',$user->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="0" name="block">
                                                <button class="btn btn-danger" type="submit">حظر</button>
                                            </form>
                                        @else
                                            <form action="{{route('user.block',$user->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="1" name="block">
                                                <button class="btn btn-success" type="submit">الغاء الحظر</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td><a href="{{route('user.edit',$user->id)}}">تعديل</a></td>
                                    <td>
                                        <form method="POST" action="{{route('user.destroy',$user->id)}}">
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
