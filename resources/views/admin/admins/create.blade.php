
@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body">
                @include('layouts.form_errors')
                <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="card-title">انشاء ادمن</h3>
                        <hr>
                            <div class="form-group">
                                    <label class="control-label">الاسم</label>
                                    <input type="text" name="name" class="form-control" placeholder="ادخل الاسم....">
                            </div>

                            <div class="form-group">
                                <label class="control-label">الايميل</label>
                                <input type="email" name="email" class="form-control" placeholder="ادخل الايميل....">
                            </div>



                            <div class="form-group has-success">
                                    <label class="control-label">القاعده</label>
                                    <select class="form-control custom-select" name="role_id">
                                        @foreach($roles as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                        <div class="form-group">
                            <label class="control-label">كلمه السر</label>
                            <input type="password" name="password" class="form-control" placeholder="*******">
                        </div>

                        <div class="form-group">
                            <label class="control-label">الصوره</label>
                            <input type="file" name="photo_id" class="form-control">
                        </div>

                        <div class="form-group col-6 m-auto">
                            <button type="submit" class="btn btn-success" style="width:100%"> <i class="fa fa-check"></i> انشاء </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection