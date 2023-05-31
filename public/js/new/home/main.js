// recharge_now 
$('#recharge_now').click(function(){
    $('#recharge_hide_form').fadeIn(500);
});
$('#recharge_hide_form_close').click(function(){
    $('#recharge_hide_form').fadeOut(500);
});
// amount_selct_then 
$('#recharge_info_form').submit(function(e){
    e.preventDefault();
    $('.payment_box_container').fadeIn(500);
    $('#recharge_hide_form').fadeOut(500);
});

$('span#payment_method_closs').click(function(){
    $('.payment_box_container').fadeOut(500);
});

// goto recharge 
$('.payment_box_container .payment_box_wrapper .box_r').click(function(){
    // let id = $(this).children('.get_id').val();
    let amount = $('#recharge_amount').val();
    let validate = $(this).children('.main-header').html();

    if(validate == "Pay With Bkash"){
        window.location.href=url+"package/buy/1/"+amount;
    }else if(validate == "Pay With Nagad"){
        window.location.href=url+"package/buy/2/"+amount;
    }else if(validate == "Pay With Rocket"){
        window.location.href=url+"package/buy/3/"+amount;
    }else{
        window.location.href=url+"package/buy/4/"+amount;
    }
});