@php
    $adminData = App\Models\admin_account::where('id', 1) -> first()
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Login & signup form!!</title>
    <link rel="stylesheet" href="{{asset('css\new\accout\account.css')}}">
    <link rel="shortcut icon" href="{{asset('images/web_logo/'.$adminData['logo'])}}" type="image/x-icon">
</head>

<body>
    <div class="container_wrapper">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>

        <form id="form_login">
            {{-- ajax start--}}
            <input type="hidden" id="ip_login">
            <input type="hidden" id="city_login">
            <input type="hidden" id="region_login">
            <input type="hidden" id="country_login">
            <input type="hidden" id="postal_login">
            {{-- ajax end  --}}
            <h3>Login Here</h3>

            <div class="box"  id="Login_Username">
                <label for="Login_Username">Username</label>
                <input type="text" >
                <span></span>
            </div>


            <div class="box"  id="Login_password">
                <label for="Login_password">Password</label>
                <input type="password" >
                <span></span>
            </div>

            <button id="logn_btn" type="submit">Log In</button>
            <div class="social">
                <div class="fb" id="signup_page">Signup</div>
            </div>
            <br>
            <br>
            <a href="" class="forget">Forget password??</a>
        </form>

        <form style="display: none" id="form_signup">
            <h3>Signup Here</h3>

            <div class="box" id="Signup_First_Name">
                <label for="First_Name">First Name</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Last_Name">
                <label for="Last_Name">Last Name</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Username">
                <label for="Username">Username</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Mobile_Number">
                <label for="Mobile_Number">Mobile Number</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Email_address">
                <label for="Email_address">Email address</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Password">
                <label for="Password">Password</label>
                <input type="text">
                <span></span>
            </div>

            <div class="box" id="Signup_Confirmed_Password">
                <label for="Confirmed_Password">Confirmed Password</label>
                <input type="password">
                <span></span>
            </div>

            <div class="box" id="Signup_Invitation_Code">
                <label for="Invitation_Code">Invitation Code(Optional)</label>
                <input type="text" value="<?php if(isset($_REQUEST['invite'])){echo $_REQUEST['invite'];}?>">
                <span></span>
            </div>

            <button id="submit_btn">Sign up</button>

            <div class="social">
                <div class="fb"id="login_page">Login</div>
            </div>
        </form>

    </div>
    {{-- script  --}}
    <script src="{{asset('js\old\jQuery.js')}}"></script>
    <script src="{{asset('js\old\url.js')}}"></script>
    <script src="{{asset('js\new\account\account.js')}}"></script>

</body>
</html>
<!-- partial -->
