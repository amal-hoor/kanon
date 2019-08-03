@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-body">
                    @include('layouts.form_errors')
                    <form method="POST" action="{{route('consult.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">انشاء استشاره</h3>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">السؤال</label>
                                <input type="text" name="question" class="form-control" placeholder="ادخل السؤال......">
                            </div>

                            <div class="form-group">
                                <label class="control-label">المحتوي</label>
                                <textarea name="content" class="form-control" placeholder="ادخل المحتوي...."></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">السعر</label>
                                <input type="text" name="price" class="form-control" placeholder="ادخل السعر.....">
                            </div>

                            <div class="form-group has-success">
                                <label class="control-label">الفئه</label>
                                <select class="form-control custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
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

