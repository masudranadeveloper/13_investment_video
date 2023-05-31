<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $userData = App\Models\user_account::where('csrf', session() -> get('csrf')) -> first();
        $adminData = App\Models\admin_account::where('id',1) -> first();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$adminData['title']}}</title>
    <link rel="shortcut icon" href="{{asset('images/website/logo/'.$adminData['logo'])}}" type="image/x-icon">
    {{-- style  --}}
    <link rel="stylesheet" href="{{asset("css/new/day.css")}}">
    {{-- <link rel="stylesheet" href="{{asset("css/new/night.css")}}"> --}}
    <link rel="stylesheet" href="{{asset("css/new/main.css")}}">
    <link rel="stylesheet" href="{{asset('css/old/grid.css')}}">
    {{-- script  --}}
    <script src="{{asset('js/old/jQuery.js')}}"></script>
    <script src="{{asset('js/old/url.js')}}"></script>
</head>
<body>
<!-- =============== Navigation ================ -->
<div style="width: 100% !important" class="container_header">
    <div class="navigation">
        <ul class="navigation_ul">
            <li >
                <a href="{{route('home_show')}}">
                    <span class="icon">
                        <ion-icon name="logo-apple"></ion-icon>
                    </span>
                    <span class="title">Web Site Name</span>
                </a>
            </li>

            <li class="{{Route::is('home_show') ? 'hovered': '' ; }}" >
                <a href="{{route('home_show')}}">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li id="copy_sponser_linnk">
                <a>
                    <span class="icon">
                        <ion-icon name="clipboard-outline"></ion-icon>
                    </span>
                    <span class="title">Copy Sponsor Link</span>
                </a>
            </li>

            <li class="{{Route::is('task_show') ? 'hovered': '' ; }}">
                <a href="{{route('task_show')}}">
                    <span class="icon">
                        <ion-icon name="videocam-outline"></ion-icon>
                    </span>
                    <span class="title">Task</span>
                </a>
            </li>

            <li class="{{Route::is('package_show') ? 'hovered': '' ; }}">
                <a href="{{route('package_show')}}">
                    <span class="icon">
                        <ion-icon name="copy-outline"></ion-icon>
                    </span>
                    <span class="title">Buy Package</span>
                </a>
            </li>

            <li class="{{Route::is('show_1stgen') ? 'hovered': '' ; }}">
                <a href="{{route('show_1stgen')}}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Team Report</span>
                </a>
            </li>


            <li class="{{Route::is('withdraw_show') ? 'hovered': '' ; }}">
                <a href="{{route('withdraw_show')}}">
                    <span class="icon">
                        <ion-icon name="card-outline"></ion-icon>
                    </span>
                    <span class="title">Withdrawal</span>
                </a>
            </li>

            <li class="{{Route::is('show_recharge_history_pending') || Route::is('show_recharge_history_success') || Route::is('show_recharge_history_rejected') || Route::is('show_withdraw_history_pending') || Route::is('show_withdraw_history_success') || Route::is('show_withdraw_history_rejected') ? 'hovered': '' ; }}">
                <a>
                    <span class="icon">
                        <ion-icon name="albums-outline"></ion-icon>
                    </span>
                    <span class="title">Acount History</span>
                    <span class="icon left_arrow_ft {{Route::is('show_recharge_history_pending') || Route::is('show_recharge_history_success') || Route::is('show_recharge_history_rejected') || Route::is('show_withdraw_history_pending') || Route::is('show_withdraw_history_success') || Route::is('show_withdraw_history_rejected') ? 'active-icon': '' ; }}">
                        <ion-icon class="right_arrow_header" name="arrow-back-outline"></ion-icon>
                    </span>
                </a>

                <ul class="drop-down {{Route::is('show_recharge_history_pending') || Route::is('show_recharge_history_success') || Route::is('show_recharge_history_rejected') || Route::is('show_withdraw_history_pending') || Route::is('show_withdraw_history_success') || Route::is('show_withdraw_history_rejected') ? 'active': '' ; }}">
                    <li>
                        <a href="{{route('show_recharge_history_pending')}}" class="title">
                            <span class="icon">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </span>
                            <span class="title">Recharge</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('show_withdraw_history_pending')}}" class="title">
                            <span class="icon">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </span>
                            <span class="title">Withdrawals</span>
                        </a>
                    </li>
                </ul>

            </li>

            <li class="{{Route::is('profile_show',['id' => $userData['id']]) ? 'hovered': '' ; }}">
                <a href="{{route('profile_show', ['id' => $userData['id']])}}">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Profile</span>
                </a>
            </li>

            <li class="{{Route::is('settings_show') ? 'hovered': '' ; }}">
                <a href="{{route('settings_show')}}">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('settings_show')}}">
                    <span class="icon">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </span>
                    <span class="title">Telegram Group</span>
                </a>
            </li>

            <li>
                <a href="{{route('logout')}}">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle main-header">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input id="user_username_search" type="text" placeholder="Search here username...">
                </label>
                <ul class="user_username_search_html d-none">

                    {{-- <li>
                        <a href="" class="header">
                            <div class="box">
                                <img src="{{asset('images/users/userprofile.png')}}" alt="">
                                <p class="title">Username</p>
                            </div>
                        </a>
                    </li> --}}

                </ul>
            </div>

            <div class="my_settings">
                <ion-icon name="settings-outline"></ion-icon>
                <ul class="my_settings_ul d-none">
                    <li><a class="header" href="{{route('profile_show', ['id' => $userData['id']])}}">Settings</a></li>
                    <li><a class="header" href="{{route('settings_show')}}">Profile</a></li>
                    <hr>
                    <li><a class="header" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>



    <div style="display: none" id="copy_refarel_id">
        <div class="container">
            <span class="copy_refarel_idclose"><ion-icon  name="close-circle-outline"></ion-icon></span>
            <h2 class="main-header">Sponsor Link</h2>
            <div class="input_box">
                <input type="text" name="" id="myInput" value="{{url('account?invite='.$userData['invite'])}}">
                <button id="copy_btn" onclick="myFunction()" class="btn-success">Copy</button>
            </div>
        </div>
    </div>

<script>
    function myFunction() {
        $('#copy_btn').html("Coping...");
        // Get the text field
        var copyText = document.getElementById("myInput");
        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);
        // Alert the copied text
        setTimeout(() => {
            $('#copy_btn').html("Copied");
        }, 200);
    }

    // search query
    $('#user_username_search').keyup(function(){
        if($('#user_username_search').val().length > 0){
            $('.user_username_search_html').removeClass('d-none');
            $('.user_username_search_html').html('<li class="text-center main-header">Loadding...</li>');
            // ajax
            $.ajax({
                "url" : url+"api/home/get_data_search_username",
                "method" : "POST",
                "data" : {
                    "val" : $('#user_username_search').val()
                },
                success:function(data){
                    if(data.st == true){
                        var map_data = data.data.map((curE) => {
                            return ''+
                                '<li>'+
                                    '<a href="'+url+"profile/"+curE.id+'" class="header">'+
                                        '<div class="box">'+
                                            '<img src="'+url+"images/users/"+curE.picture+'" alt="">'+
                                            '<p class="title">'+curE.userName+'</p>'+
                                        '</div>'+
                                    '</a>'+
                                '</li>'+
                                '';
                        })
                        $('.user_username_search_html').html(map_data);
                    }else{
                        $('.user_username_search_html').html('<li class="text-center main-header">No Users Found!</li>');
                    }
                }
            })
        }else{
            $('.user_username_search_html').addClass('d-none');
        }
    });
</script>
