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
                                <th>المستخدم</th>
                                <th>الاستشاره</th>
                                <th>الحاله</th>
                                <th>مجانيه او مدفوعه؟</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->consult->question}}</td>
                                    <td>
                                        @if($order->status==0)
                                            <form action="{{route('order.update',$order->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="1" name="status">
                                                <button class="btn btn-success" type="submit">Approve</button>
                                            </form>
                                        @else
                                            <form action="{{route('order.update',$order->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="0" name="status">
                                                <button class="btn btn-danger" type="submit">Un Approve</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>@if($order->isfree==0) استشاره مجانيه@else غير مجانيه @endif</td>

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


