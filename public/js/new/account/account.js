// page show
$('#signup_page').click(function(){
    $('#form_signup').fadeIn(500);
    $('#form_login').css('display', 'none');
});

$('#login_page').click(function(){
    $('#form_signup').css('display', 'none');
    $('#form_login').fadeIn(500);
});

// check all is ok or not
// Signup_First_Name
$('#Signup_First_Name input').keyup(function(){
    $('#Signup_First_Name span').html('');
    $('#Signup_First_Name').removeClass('err');

    let reg = /^[A-Z]+$/i;
    if(reg.test($('#Signup_First_Name input').val()) == true){
        $('#Signup_First_Name span').html('');
    }else{
        $('#Signup_First_Name span').html('<p class="error">Only character allowed!</p>');
        $('#Signup_First_Name').addClass('err');
    }
});

// Signup_Last_Name
$('#Signup_Last_Name input').keyup(function(){
    $('#Signup_Last_Name span').html('');
    $('#Signup_Last_Name').removeClass('err');

    let reg = /^[A-Z]+$/i;
    if(reg.test($('#Signup_Last_Name input').val()) == true){
        $('#Signup_Last_Name span').html('');
    }else{
        $('#Signup_Last_Name span').html('<p class="error">Only character allowed!</p>');
        $('#Signup_Last_Name').addClass('err');
    }
});


// Signup_Username
$('#Signup_Username input').keyup(function(){
    $('#Signup_Username span').html('Checking...');
    $('#Signup_Username').removeClass('err');
    $('#Signup_Username span').css('color', 'red');
    // ajax
    $.ajax({
        "url" : url+"api/account/check_username",
        "method" : "post",
        "data" : {
            "userName" : $('#Signup_Username input').val(),
        },
        success:function(data){
            if(data.st == true){
                $('#Signup_Username span').html('Avaiable');
                $('#Signup_Username span').css('color', 'green');
                $('#Signup_Username').removeClass('err');

                setTimeout(() => {
                    $('#Signup_Username span').html('');
                }, 2000);

            }else{
                $('#Signup_Username span').html('<p class="error">This username is already use!</p>');
                $('#Signup_Username').addClass('err');
            }
        }
    })
});


// Signup_Mobile_Number
$('#Signup_Mobile_Number input').keyup(function(){
    $('#Signup_Mobile_Number span').html('');
    $('#Signup_Mobile_Number').removeClass('err');

    let reg = /01[1-9]\d{8}/i;
    if(reg.test($('#Signup_Mobile_Number input').val()) == true){
        $('#Signup_Mobile_Number span').css('color', 'red');
        $('#Signup_Mobile_Number span').html('Checking...');

        // ajax
        $.ajax({
            "url" : url+"api/account/check_mobile_number",
            "method" : "post",
            "data" : {
                "mobileNumber" : $('#Signup_Mobile_Number input').val(),
            },
            success:function(data){
                if(data.st == true){
                    $('#Signup_Mobile_Number span').html('Avaiable');
                    $('#Signup_Mobile_Number span').css('color', 'green');
                    $('#Signup_Mobile_Number').removeClass('err');

                    setTimeout(() => {
                        $('#Signup_Mobile_Number span').html('');
                    }, 2000);

                }else{
                    $('#Signup_Mobile_Number span').html('<p class="error">This mobile number is already use!</p>');
                    $('#Signup_Mobile_Number').addClass('err');
                }
            }
        })
    }else{
        $('#Signup_Mobile_Number span').html('<p class="error">Invalid mobile number!</p>');
        $('#Signup_Mobile_Number').addClass('err');
    }
});

// Signup_Email_address
$('#Signup_Email_address input').keyup(function(){
    $('#Signup_Email_address span').html('');
    $('#Signup_Email_address').removeClass('err');

    let reg = /^\S+@((gmail?)||(yahoo?)||(hotmail?)).com/i;
    if(reg.test($('#Signup_Email_address input').val()) == true){
        $('#Signup_Email_address span').css('color', 'red');
        $('#Signup_Email_address span').html('Checking...');
        // ajax
        $.ajax({
            "url" : url+"api/account/check_email",
            "method" : "post",
            "data" : {
                "email" : $('#Signup_Email_address input').val(),
            },
            success:function(data){
                if(data.st == true){
                    $('#Signup_Email_address span').html('Avaiable');
                    $('#Signup_Email_address span').css('color', 'green');
                    $('#Signup_Email_address').removeClass('err');

                    setTimeout(() => {
                        $('#Signup_Email_address span').html('');
                    }, 2000);

                }else{
                    $('#Signup_Email_address span').html('<p class="error">This mobile number is already use!</p>');
                    $('#Signup_Email_address').addClass('err');
                }
            }
        })
    }else{
        $('#Signup_Email_address span').html('<p class="error">Invalid gmail address!</p>');
        $('#Signup_Email_address').addClass('err');
    }
});

// Signup_Password
$('#Signup_Password input').keyup(function(){
    $('#Signup_Password span').html('');
    $('#Signup_Password').removeClass('err');

    if($('#Signup_Password input').val().length > 5 ){
        $('#Signup_Password span').html('');
    }else{
        $('#Signup_Password span').html('<p class="error">Enter password more then 5 digit!</p>');
        $('#Signup_Password').addClass('err');
    }
});

// Signup_Confirmed_Password
$('#Signup_Confirmed_Password input').keyup(function(){
    $('#Signup_Confirmed_Password span').html('');
    $('#Signup_Confirmed_Password').removeClass('err');

    if($('#Signup_Confirmed_Password input').val() == $('#Signup_Password input').val()){
        $('#Signup_Confirmed_Password span').html('');
    }else{
        $('#Signup_Confirmed_Password span').html("<p class='error'>Confirmed password doesn't match!</p>");
        $('#Signup_Confirmed_Password').addClass('err');
    }
});

// Signup_Invitation_Code
$('#Signup_Invitation_Code input').keyup(function(){
    $('#Signup_Invitation_Code span').html('Checking...');
    $('#Signup_Invitation_Code').removeClass('err');
    $('#Signup_Invitation_Code span').css('color', 'red');
    if($('#Signup_Invitation_Code input').val() == ""){
        $('#Signup_Invitation_Code span').html('');
    }else{
        // ajax
        $.ajax({
            "url" : url+"api/account/check_invitation_code",
            "method" : "post",
            "data" : {
                "invite" : $('#Signup_Invitation_Code input').val(),
            },
            success:function(data){
                if(data.st == true){
                    $('#Signup_Invitation_Code span').html('Avaiable');
                    $('#Signup_Invitation_Code span').css('color', 'green');
                    $('#Signup_Invitation_Code').removeClass('err');

                    setTimeout(() => {
                        $('#Signup_Invitation_Code span').html('');
                    }, 2000);

                }else{
                    $('#Signup_Invitation_Code span').html('<p class="error">This invitation code not found!</p>');
                    $('#Signup_Invitation_Code').addClass('err');
                }
            }
        })
    }
});


// submit form
$('#form_signup').submit(function(e){
    e.preventDefault();
    if($('#Signup_Confirmed_Password input').val() == $('#Signup_Password input').val()){
        $('#Signup_Confirmed_Password span').html('');
        $('#submit_btn').attr('disabled', true);
        $('#submit_btn').html('Loadding...');
        if($('#form_signup .box').hasClass('err')){
            $('#submit_btn').attr('disabled', false);
            $('#submit_btn').html('Try Again');
        }else{
            // ajax
            $.ajax({
                "url" : url+"api/account/signup",
                "method" : "post",
                "data" : {
                    "fName" : $('#Signup_First_Name input').val(),
                    "lName" : $('#Signup_Last_Name input').val(),
                    "userName" : $('#Signup_Username input').val(),
                    "mobileNumber" : $('#Signup_Mobile_Number input').val(),
                    "email" : $('#Signup_Email_address input').val(),
                    "password" : $('#Signup_Password input').val(),
                    "invitor" : $('#Signup_Invitation_Code input').val()
                },
                success:function(data){
                    $('#submit_btn').html('Success');
                    window.location.href=url;
                }
            })
        }
    }else{
        $('#Signup_Confirmed_Password span').html("<p class='error'>Confirmed password doesn't match!</p>");
        $('#Signup_Confirmed_Password').addClass('err');
    }
});

// login a user
// ajax
$.ajax({
    "url" : "https://ipinfo.io/?token=f353303466f616",
    "method" : "post",
    "data" : {},
    success:function(data){
        $('#ip_login').val(data.ip);
        $('#city_login').val(data.city);
        $('#region_login').val(data.region);
        $('#country_login').val(data.country);
        $('#postal_login').val(data.postal);
    }
})

$('#form_login').submit(function(e){
    e.preventDefault();

    $('#logn_btn').attr('disabled', true);
    $('#logn_btn').html('Loadding...');

    $('#Login_Username span').html("");
    $('#Login_password span').html("");

    $.ajax({
        "url" : url+"api/account/login",
        "method" : "post",
        "data" : {
            "userName" : $('#Login_Username input').val(),
            "password" : $('#Login_password input').val(),
            "ip" : $('#ip_login').val(),
            "city" : $('#city_login').val(),
            "region" : $('#region_login').val(),
            "country" : $('#country_login').val(),
            "postal" : $('#postal_login').val(),
        },
        success:function(data){
            if(data.st == true){
                $('#logn_btn').html('Success');
                window.location.href=url;
            }else{
                $('#logn_btn').attr('disabled', false);
                $('#logn_btn').html('Try Again');

                if(data.username != undefined){
                    $('#Login_Username span').html("<p class='error'>"+data.username+"</p>");
                }
                if(data.password != undefined){
                    $('#Login_password span').html("<p class='error'>"+data.password+"</p>");
                }

            }

        }
    })
});
