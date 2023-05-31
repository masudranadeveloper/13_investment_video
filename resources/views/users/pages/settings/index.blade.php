@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\settings\main.css')}}">

<section id="profile_settings">
    <div class="profile_settings_wraper">
        <div class="user_details">
            <div class="header">
                <form action="{{route('api_setting_profile')}}" method="post" enctype="multipart/form-data">
                    <div class="images"></div>
                    <h2 class="main-header text-center">{{$userData['fName']}} {{$userData['lName']}}</h2>
                    <div class="input_box">
                        <input type="file" name="file">
                        <button type="submit" class="btn-success">Upload</button>
                    </div>
                </form>
            </div>

            <div class="body">
                <li>
                    <p class="title">Account Status</p>
                    <p class="btn-success">{{$userData['accSt']}}</p>
                </li>
                <li>
                    <p class="title">Current Package</p>
                    <p class="btn-success">{{$userData['package_name']}}</p>
                </li>
                <li>
                    <p class="title">Total Recharge</p>
                    <p class="title">${{$total_success_recharge}}</p>
                </li>
            </div>
        </div>

        <div class="user_settings">
            <div class="navbar">
                <ul>
                    <li class="title active"><ion-icon name="create-outline"></ion-icon> <span>Edit</span></li>
                    {{-- <li class="title"><ion-icon name="mail-outline"></ion-icon><span>E-mail</span></li> --}}
                    <li class="title"><ion-icon name="lock-closed-outline"></ion-icon><span>Password</span></li>
                </ul>
            </div>
            <div class="content">

                <div class="personal_info personal_info1">
                    {{-- <div class="main_box">
                        <div class="left_part">
                            <p class="title">Full Name</p>
                        </div>
                        <div class="right_part">
                            <div class="input_box">
                                <input type="text" style="width: 100%" name="" placeholder="Enter full name">
                            </div>
                        </div>
                    </div> --}}
                    <form action="{{route('api_setting_address')}}" method="post">
                        <div class="main_box">
                            <div class="left_part">
                                <p class="title">Address</p>
                            </div>
                            <div class="right_part">
                                <div style="width: 100%" class="input_box">
                                    <input type="text" style="width: 100%" required name="street" value="{{$userData['street']}}" placeholder="Street">
                                </div>
                            </div>
                        </div>

                        <div class="main_box">
                            <div class="left_part">
                            </div>
                            <div class="right_part">
                                <div class="fff">
                                    <div class="input_box">
                                        <input type="text" style="width: 100%" required name="city" value="{{$userData['city']}}" placeholder="City">
                                    </div>
                                    <div class="input_box">
                                        <input type="text" style="width: 100%" required name="state" value="{{$userData['state']}}" placeholder="State">
                                    </div>
                                    <div class="input_box">
                                        <input type="text" style="width: 100%" required name="postcode" value="{{$userData['postcode']}}" placeholder="Postal code">
                                    </div>
                                    <div class="input_box">
                                        <input type="text" style="width: 100%" required name="mobileNumber" value="{{$userData['mobileNumber']}}" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="main_box">
                            <div class="left_part">
                                <p class="title">Country</p>
                            </div>
                            <div class="right_part">
                                <div class="input_box">
                                    <input type="text" style="width: 100%" required name="country" value="{{$userData['country']}}" placeholder="Country">
                                </div>
                            </div>
                        </div>

                        <button type="submit" style="width: 100%;margin-top:2rem" class="btn-primary">Update</button>
                    </form>
                </div>

                {{-- <div style="display: none" class="personal_info personal_info2">
                    <div class="main_box">
                        <div class="left_part">
                            <p class="title">Email</p>
                        </div>
                        <div class="right_part">
                            <div class="input_box">
                                <input type="text" style="width: 100%" name="" placeholder="Enter E-mail">
                            </div>
                        </div>
                    </div>

                    <div class="main_box">
                        <div class="left_part">
                            <p class="title">Password</p>
                        </div>
                        <div class="right_part">
                            <div class="input_box">
                                <input type="text" name="" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div style="width: 100%;margin-top:2rem" class="btn-primary">Update</div>
                </div> --}}

                <div style="display: none" class="personal_info personal_info3">

                    <form id="password_change" method="post">

                        <p style="padding: 1rem; text-align:center;color:red" class="title Error_password"></p>

                        <div class="main_box">
                            <div class="left_part">
                                <p class="title">Current Password</p>
                            </div>
                            <div class="right_part">
                                <div class="input_box">
                                    <input type="text" id="current_password" required placeholder="Current Password">
                                    <span style="border-left: 1px solid var(--border)" ><ion-icon name="eye-outline"></ion-icon></span>
                                </div>
                            </div>
                        </div>

                        <div class="main_box">
                            <div class="left_part">
                                <p class="title">New Password</p>
                            </div>
                            <div class="right_part">
                                <div class="input_box">
                                    <input type="text" id="new_password" required placeholder="New Password">
                                    <span style="border-left: 1px solid var(--border)" ><ion-icon name="eye-outline"></ion-icon></span>
                                </div>
                            </div>
                        </div>

                        <div class="main_box">
                            <div class="left_part">
                                <p class="title">Confirm Password</p>
                            </div>
                            <div class="right_part">
                                <div class="input_box">
                                    <input id="confirm_pass" type="text" required placeholder="Confirm Password">
                                    <span style="border-left: 1px solid var(--border)"><ion-icon name="eye-outline"></ion-icon></span>
                                </div>
                            </div>
                        </div>

                        <button id="password_change_btn" type="submit" style="width: 100%;margin-top:2rem" class="btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

{{-- script  --}}
<script src="{{asset('js\new\settings\settings.js')}}"></script>
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    // online & ofline bar
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
    // password chnage bar
    $('#password_change').submit(function(e){
        e.preventDefault();
        $('#password_change_btn').html('Loadding...');

        if($("#new_password").val() != $("#confirm_pass").val()){
            $('.Error_password').html("Confirmed password doesnot match!");
            $('#password_change_btn').html('Try Again');
        }else{
            if($("#new_password").val().length < 5){
                $('.Error_password').html("New password ccontains mutch be 6 digit!");
                $('#password_change_btn').html('Try Again');
            }else{
                $.ajax({
                    "url" : url+"api/setting/change_password",
                    "method" : "POST",
                    "data" : {
                        "o_pass" : $("#current_password").val(),
                        "n_pass" : $("#new_password").val(),
                        "c_pass" : $("#confirm_pass").val(),
                    },
                    success:function(data){
                        if(data.st == true){
                            $('#password_change_btn').html('Success');
                            window.location.href=url+"success?msg=Your password successfully change!";
                        }else{
                            $('.Error_password').html(data.msg);
                            $('#password_change_btn').html('Try Again');
                        }
                        console.log(data);
                    }
                })
            }
        }
    });
</script>

@php
    $profile_pic = "../../../images/users/".$userData['picture'];
@endphp

<style>
#profile_settings .profile_settings_wraper .user_details .images {
    background-image: url(<?php echo $profile_pic?>);
}
</style>
@endsection
