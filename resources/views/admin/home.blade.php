@extends('layouts.admin')
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 450px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
</style>

@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="../assets/images/icon/income-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Income</h6>
                        <h2 class="m-t-0 text-white">953,000</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="../assets/images/icon/expense-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Expense</h6>
                        <h2 class="m-t-0 text-white">236,000</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="../assets/images/icon/assets-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Assets</h6>
                        <h2 class="m-t-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="../assets/images/icon/staff-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Staff</h6>
                        <h2 class="m-t-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h3 class="card-title m-b-5"><span class="lstick"></span>Sales Overview </h3>
                    </div>
                    <div class="ml-auto">
                        <select class="custom-select b-0">
                            <option selected="">January 2017</option>
                            <option value="1">February 2017</option>
                            <option value="2">March 2017</option>
                            <option value="3">April 2017</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-theme stats-bar">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="p-20 active">
                            <h6 class="text-white">Total Sales</h6>
                            <h3 class="text-white m-b-0">$10,345</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="p-20">
                            <h6 class="text-white">This Month</h6>
                            <h3 class="text-white m-b-0">$7,589</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="p-20">
                            <h6 class="text-white">This Week</h6>
                            <h3 class="text-white m-b-0">$1,476</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="sales-overview2" class="p-relative" style="height:330px;"></div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- visit charts-->
    <!-- ============================================================== -->

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h4 class="card-title"><span class="lstick"></span>Orders</h4></div>

                </div>
                <div class="table-responsive m-t-20">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table vm no-th-brd pro-of-month">
                        <thead>
                        <tr>
                            <th>Assigned</th>
                            <th>Name</th>
                            <th>Priority</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                @if($user->consults)
                            <tr>
                                <td style="width:50px;"><span class="round">@if($user->photo)<img src="{{asset('/images/'.$user->photo->path)}}" alt="user" width="50" height="50">@else<img src="https://via.placeholder.com/150" width="50">@endif</span></td>
                                <td> <h6>{{$user->name}}</h6></td>
                                <td><span class="label label-success label-rounded">Low</span></td>
                            </tr>
                                @endif
                           @endforeach

                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6 col-sm-offset-5">--}}
                                {{--{{$users->render()}}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection