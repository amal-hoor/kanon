
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-body">
                    @include('layouts.form_errors')

                        <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf

                            <div class="form-body">
                                <h3 class="card-title">انشاء فيديو</h3>
                                <hr>

                                <div class="form-group row">
                                    <label class="control-label">الفئه</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label">Enter Videos Number Here</label>
                                    <input id="videos_number" type="number" name="videos_number" class="form-control">
                                </div>
                                <div id="videos-data">
                                    {{-- video data --}}
                                </div>


                                <div class="form-actions mb-5 ">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>انشاء فيديو</button>
                                </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
    @endsection


@section('scripts')
    <script>
        $("#videos_number").change(function(){
            var i = $(this).val();
            var x;
            for(x=0;x<i;x++){
                $("#videos-data").append('<div class="form-group row"><label class="control-label">العنوان'+parseInt(x+1)+'</label><input type="text" name="video_title[]" placeholder="العنوان" class="form-control"></div><div class="form-group row"><label class="control-label">الوصف '+parseInt(x+1)+'</label><textarea  name="video_description[]" class="form-control"></textarea></div><div class="form-group row"><label class="control-label"> الرابط '+ parseInt(x+1) +'</label><input type="text" class="form-control" name="video_url[]" placeholder="الرابط"> </div><hr>');
            }
        });
    </script>
@endsection


