
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-body">
                    @include('layouts.form_errors')
                    <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h3 class="card-title">تعديل مستخدم</h3>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">الاسم</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">الايميل</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            </div>



                            <div class="form-group has-success">
                                <label class="control-label">القاعده</label>
                                <select class="form-control custom-select" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">كلمه السر</label>
                                <input type="password" name="password" class="form-control" value="{{$user->password}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">الصوره</label>
                                <div class="row">
                                    <div class="col-4">
                                        @if($user->photo)
                                        <img src="{{asset('/images/'.$user->photo->path)}}" width="100" height="100">
                                            @else
                                            لا توجد صوره
                                        @endif
                                    </div>
                                    <div class="col-8">
                                    <input type="file" name="photo_id" class="form-control">
                                    </div>
                                </div>
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