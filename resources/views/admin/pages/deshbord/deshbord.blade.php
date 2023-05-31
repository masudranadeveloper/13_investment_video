@extends('admin.layout.master')
@section('admin_master')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin_show')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">My Dashboard</li>
</ol>
<!-- Icon Cards-->

<div class="row">

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">{{$pen_recharge}} Panding Recharge</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_recharge_new')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">{{$pen_withdraw}} Panding Withdraw</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_withdraw_new')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">{{$adminData['todaysRecharge']}}$ Todays Recharge</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_recharge_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">{{$adminData['yesterdayRecharge']}}$ Yesterday Recharge</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_recharge_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">{{$adminData['todaysWithdraw']}}$ Todays Withdraw</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_withdraw_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"> {{$adminData['yesterdayWithdraw']}}$ Yesterday Withdraw</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_withdraw_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5">{{$tot_recharge_usdt+$tot_recharge_bdt_cb}}$ Total Recharge</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_recharge_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5">{{$tot_withdraw_usdt+$tot_withdrawbdt_cb}}$ Total Withdraw</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('show_withdraw_success')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
    </div>

</div>

<!-- Example DataTables Card-->
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> DATA TABLE
    </div>

    @if ($user_account -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Total Amount</th>
                            <th>User Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user_account as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['fName']}} {{$item['lName']}}</td>
                                <td>{{$item['userName']}}</td>
                                <td>{{$item['totalAmount']}}</td>
                                <td>
                                    @if($item['online_time'] > time())
                                        <span class="btn btn-success">Online</span>
                                    @else
                                        <span class="btn btn-danger">Ofline</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="return confirm('You want to ban this item??')" href="{{route('api_users_ban', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <a href="{{route('show_users_profile', ['id' => $item['id']])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4 class="text-center">No Data Found!</h4>
    @endif

    {{$user_account -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->
@endsection
