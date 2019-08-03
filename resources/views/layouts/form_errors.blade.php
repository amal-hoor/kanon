
@if($errors->any())
    <div class="mt-2 alert alert-danger">
        <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif