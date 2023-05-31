$('#profile_settings .profile_settings_wraper .user_settings .navbar ul li').click(function(){
    $('#profile_settings .profile_settings_wraper .user_settings .navbar ul li').removeClass('active');
    $(this).addClass('active');
    if($(this).children('span').html() == "Edit"){
        $('.personal_info1').css('display', 'block');
        $('.personal_info2').css('display', 'none');
        $('.personal_info3').css('display', 'none');
    }else if($(this).children('span').html() == "E-mail"){
        $('.personal_info1').css('display', 'none');
        $('.personal_info2').css('display', 'block');
        $('.personal_info3').css('display', 'none');
    }else{
        $('.personal_info1').css('display', 'none');
        $('.personal_info2').css('display', 'none');
        $('.personal_info3').css('display', 'block');
    }

});
