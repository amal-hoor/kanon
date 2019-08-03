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
                                <th>المحادثه</th>
                                <th>الرسائل</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($conversations as $conversation)

                                        <tr>
                                            <td>between:{{$conversation->user->name}} && {{$conversation->admins->name}}
                                            </td>
                                            <td>
                                                @foreach($conversation->messages as $message)
                                                    <p>{{$message->content}}</p>
                                                @endforeach
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

