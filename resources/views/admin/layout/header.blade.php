<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $adminData = App\Models\admin_account::where('id', 1) -> first()
    @endphp
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('images/website/logo/'.$adminData['logo'])}}" type="image/x-icon">
    <title>{{$adminData['title']}} || Admin Panel</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'> {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('css\old\admin\admin.css')}}">
    <script src='{{asset('js\old\jQuery.js')}}'></script>
    <script src="{{asset('js/old/url.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('images/web_logo/'.$adminData['logo'])}}" type="image/x-icon">

</head>

<body>
    <!-- partial:index.partial.html -->

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="{{route('admin_show')}}">Admin Panel</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    {{-- DESHBORD --}}
                    <li class="nav-item {{Route::is('admin_show') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="{{route('admin_show')}}">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">DESHBORD</span>
                        </a>
                    </li>
                    {{-- all users  --}}
                    <li class="nav-item {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="AllUsers">
                        <a class="nav-link nav-link-collapse {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseAllUsers" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-link-text">USERS</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "show" : "collapse"}}" id="collapseAllUsers">
                            <li>
                                <a style="color: {{Route::is('show_users_all') ? "green !important" : "none"}}" href="{{route('show_users_all')}}">ALL USERS</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_users_active') ? "green !important" : "none"}}" href="{{route('show_users_active')}}">ALL ACTIVE USERS</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_users_ban') ? "green !important" : "none"}}" href="{{route('show_users_ban')}}">ALL BAN USERS</a>
                            </li>
                        </ul>
                    </li>

                    {{-- all RECHARGE  --}}
                    <li class="nav-item {{Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="ALLRECHARGE">
                        <a class="nav-link nav-link-collapse {{Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseALLRECHARGE" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-wallet"></i>
                            <span class="nav-link-text">RECHARGE</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "show" : "collapse"}}" id="collapseALLRECHARGE">
                            <li>
                                <a style="color: {{Route::is('show_recharge_new') ? "green !important" : "none"}}" href="{{route('show_recharge_new')}}">NEW RECHARGE</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_recharge_success') ? "green !important" : "none"}}" href="{{route('show_recharge_success')}}">SUCCESS RECHARGE</a>
                            </li>
                        </ul>
                    </li>
                    {{-- all withdraw  --}}
                    <li class="nav-item {{Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="AllWIthdraw">
                        <a class="nav-link nav-link-collapse {{Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseAllWIthdraw" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-money-bill"></i>
                            <span class="nav-link-text">WITHDRAW</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "show" : "collapse"}}" id="collapseAllWIthdraw">
                            <li>
                                <a style="color: {{Route::is('show_withdraw_new') ? "green !important" : "none"}}" href="{{route('show_withdraw_new')}}">NEW WITHDRAW</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_withdraw_success') ? "green !important" : "none"}}" href="{{route('show_withdraw_success')}}">SUCCESS WITHDRAW</a>
                            </li>
                        </ul>
                    </li>
                    {{-- all PAYMENT  --}}
                    <li class="nav-item {{Route::is('show_payment') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="PAYMENT">
                        <a class="nav-link" href="{{route('show_payment')}}">
                            <i class="fa-regular fa-credit-card"></i>
                            <span class="nav-link-text">PAYMENT</span>
                        </a>
                    </li>
                    {{-- all CONTACT  --}}
                    <li class="nav-item {{Route::is('show_contact') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="CONTACT">
                        <a class="nav-link" href="{{route('show_contact')}}">
                            <i class="fa-brands fa-telegram"></i>
                            <span class="nav-link-text">CONTACT</span>
                        </a>
                    </li>
                    {{-- all users  --}}
                    <li class="nav-item {{Route::is('show_dynamic_package') || Route::is('show_tools_ads_update') || Route::is('show_tools_ads_add') || Route::is('show_tools_ads_show') || Route::is('show_dynamic_package_add') || Route::is('show_dynamic_package_update') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="tools">
                        <a class="nav-link nav-link-collapse {{Route::is('show_dynamic_package') || Route::is('show_tools_ads_update') || Route::is('show_tools_ads_add') || Route::is('show_tools_ads_show') || Route::is('show_dynamic_package_add') || Route::is('show_dynamic_package_update') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapsetools" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                            <span class="nav-link-text">TOOLS</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_dynamic_package') || Route::is('show_tools_ads_update') || Route::is('show_tools_ads_add') || Route::is('show_tools_ads_show') || Route::is('show_dynamic_package_add') || Route::is('show_dynamic_package_update') ? "show" : "collapse"}}" id="collapsetools">
                            <li>
                                <a style="color: {{Route::is('show_dynamic_package') ? "green !important" : "none"}}" href="{{route('show_dynamic_package')}}">DYNAMIC TASK FIELD</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_tools_ads_show') || Route::is('show_tools_ads_update') || Route::is('show_tools_ads_add') ? "green !important" : "none"}}" href="{{route('show_tools_ads_show')}}">DYNAMIC TASK ADS</a>
                            </li>
                        </ul>
                    </li>
                    {{-- all SETTINGS  --}}
                    <li class="nav-item {{Route::is('show_settings') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="SETTINGS">
                        <a class="nav-link" href="{{route('show_settings')}}">
                            <i class="fa-solid fa-gears"></i>
                            <span class="nav-link-text">SETTINGS</span>
                        </a>
                    </li>

                </ul>

                {{-- navbar end  --}}
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                          </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">

                    <li id="navbar_message_btn" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="">Messages
                              <span class="badge badge-pill badge-primary">{{$adminData['notification']}} New</span>
                            </span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">New Messages:</h6>
                            @php
                                $notification = App\Models\notification_urw::orderBy('id', 'DESC') -> paginate(5);
                            @endphp
                            @foreach ($notification as $item)

                                @php
                                    $userData = App\Models\user_account::Where('id', $item['userID']) -> first();
                                @endphp

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="
                                    @if($item['type'] == "account")
                                        {{route('show_users_profile', ['id' => $item['id']])}}
                                    @elseif($item['type'] == "recharge")
                                        {{route('show_recharge_new')}}
                                    @else
                                        {{route('show_withdraw_new')}}
                                    @endif
                                ">
                                    <strong>
                                        @if($item['type'] == "account")
                                            A New Account Created!
                                        @elseif($item['type'] == "recharge")
                                            Have A New Recharge Requrest!
                                        @else
                                            Have A New Withdraw Requrest!
                                        @endif
                                    </strong>
                                    <p class="small text-muted">{{$item['created_at']}}</p>
                                    <p class="small">
                                        @if($item['type'] == "account")
                                            Wellcome Mr. {{$userData['userName']}} .
                                        @elseif($item['type'] == "recharge")
                                            @php
                                                $rechargeData = App\Models\user_recharge::Where('id', $item['documentID']) -> first();
                                            @endphp
                                            Mr. {{$userData['userName']}} recharge amount {{$rechargeData['amount']}} (?). Method {{$rechargeData['method']}}.
                                        @else
                                            @php
                                                $withdrawdata = App\Models\user_withdraw::Where('id', $item['documentID']) -> first();
                                            @endphp
                                            Mr. {{$userData['userName']}} recharge amount {{$withdrawdata['amount']}} (?). Method {{$withdrawdata['Method']}}.
                                        @endif
                                    </p>
                                </a>
                            @endforeach

                        </div>

                    </li>

                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input class="form-control" type="text" id="search_username" placeholder="Search for...">
                                <span class="input-group-append">
                                <button id="search_btn" class="btn btn-primary" type="button">
                                  <i class="fa fa-search"></i>
                                </button>
                              </span>
                            </div>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>

                </ul>

            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container-fluid">


<script>
    $('#search_btn').click(function(){
        if($('#search_username').val().length > 0){
            $('#search_btn').html('<i class="fa-solid fa-hourglass-end"></i>');
            // ajax
            $.ajax({
                "url" : url+"api/admin/search_profile/"+$('#search_username').val(),
                "method" : "get",
                "data" : {},
                success:function(data){
                    if(data.st == true){
                        $('#search_btn').html('<i class="fa-solid fa-check"></i>');
                        window.location.href=url+"admin/users/profile/"+data.data.id;
                    }else{
                        $('#search_btn').html('<i class="fa-solid fa-xmark"></i>');
                    }
                    console.log(data);
                }
            });
        }else{
            $('#search_btn').html('<i class="fa fa-search"></i>');
        }

    });

    // update msg
    $('#navbar_message_btn').click(function(){
        $.ajax({
            "url" : url+"api/admin/update_notification_data",
            "method" : "get",
            "data" : {},
            success:function(){}
        })
    });
</script>
