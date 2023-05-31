$(document).ready(()=>{
    get_user_data();
})

// new task 
$('.task_next').click(()=>{
    $('.task_next').html('Loadding...');
    $('.reminder').addClass('d-none');
    if($('#user_order_task').html() == "0"){
        $('.task_next').html('No More Works Today!');
        return false;
    }
    // ajax 
    $.ajax({
        "url" : url+"api/task/get_task_ads",
        "method" : "POST", 
        "data" : {},
        success:function(data){
            $('.passenger_pic').attr('src', url+'images/task/works/'+data.data.pic);
            $('.passenger_name').html(data.data.name);
            $('.passenger_address').html(data.data.addrss);
            $('.passenger_location').html(data.data.location);
            // driver 
            $('.pa_bg').attr('src', url+'images/task/works/'+data.data.pic);
            $('.pa_success_location').html(data.data.location);

            $('.search_a_pessanger').removeClass('d-none');
            $('.search_a_pessanger').css('display', 'block');
            // -------------------------------------------------
            let randnum = Number((Math.random()*20)+1).toFixed(0);
            let randnum_change = Number((Math.random()*10)+1).toFixed(0);
            var x = setInterval(() => {
                randnum--;
                $('.searsing_passenger').html(randnum);

                if(randnum == 0){
                    $('.search_a_pessanger').slideUp(500);
                    setTimeout(() => {
                        if(randnum_change < 7){
                            $('.passenger_get').removeClass('d-none');
                        }else{
                            let array = [
                                "Passenger cancelled this ride! ):",
                                "Passenger already got other driver! ):",
                                "Passenger is busy now! ):",
                                "Passenger has too late! ):",
                                "No Passenger Found ):",
                                "No Passenger Found ):",
                                "No Passenger Found ):",
                            ];
                            let passenger_err = Number((Math.random()*6)).toFixed(0);
                            $('.reminder').removeClass('d-none');
                            $('.task_next').html('Find Again');
                            $('.reminder .content').html(array[passenger_err]);
                        }
                    }, 500);
                    clearInterval(x);
                }
                console.log(randnum);
            }, 1000);
        }
    });
    
});
// conformed passenger 
$('.confirmed_passenger').click(() => {
    $('.passenger_get').addClass('d-none');
    $('.connecting_driver').removeClass('d-none');
    $('.connecting_driver').css('display', 'block');
    // ------------------------------------------------
    let randnum_d = Number((Math.random()*20)+1).toFixed(0);
    let randnum_d_change = Number((Math.random()*10)+1).toFixed(0);
    var y = setInterval(() => {
        randnum_d--;
        $('.connecting_driver_s').html(randnum_d);

        if(randnum_d == 0){
            $('.connecting_driver').slideUp(500);
            $('.task_next').html('Next Task');

            if(randnum_d_change < 9){
                setTimeout(() => {
                    $('.collect_your_commission').removeClass('d-none');
                    $('.collect_your_commission').css('display', 'block');
                }, 500);
            }else{
                let array = [
                    "Driver cancelled this ride! ):",
                    "Driver already got an other passenger! ):",
                    "Driver is busy now! ):",
                    "Driver has too late! ):",
                    "No Driver Found ):",
                    "No Driver Found ):",
                    "No Driver Found ):",
                ];
                let passenger_err = Number((Math.random()*6)).toFixed(0);
                $('.reminder').removeClass('d-none');
                $('.task_next').html('Find Again');
                $('.reminder .content').html(array[passenger_err]);
            }
            clearInterval(y);
        }
    }, 1000);
});
// collect commission 
$('.collect_commission').click(()=>{
    $('.collect_commission').html('Loadding...');
    $('.collect_commission').prop('disabled', true);
    // ajax
    $.ajax({
        "url" : url+"api/task/get_task_commission",
        "method" : "POST",
        "data" : {
            'id' : $('#id').val()
        },
        success:function(data){
            console.log(data);
            if(data.st == true){
                $('.collect_commission').html('Success');
                get_user_data();
                setTimeout(() => {
                    $('.collect_commission').html('Collect Your Commission');
                    $('.collect_your_commission').slideUp(500);
                    $('.collect_commission').prop('disabled', false);
                }, 1000);
            }else{
                $('.collect_commission').html(data.msg);
                $('.collect_commission').prop('disabled', false);
            }
        }
    })
})

// close 
$('button.btn.btn-danger.title').click(()=>{
    $('.hidden_map_search').addClass('d-none');
    $('.task_next').html('Next Task');
});

// get_user_data
const get_user_data = () => {
    $('#user_total_amount').html("...");
    $('#user_today_in').html("...");
    $('#user_yes_in').html("...");
    $('#user_today_ref').html("...");
    $('#todays_deposit').html("...");
    $('#user_order_task').html("...");
    // ajax
    $.ajax({
        "url" : url+"api/home/get_user_data",
        "method" : "POST",
        "data" : {
            'id' : $('#id').val()
        },
        success:function(data){
            // data user
            $('#user_total_amount').html(data.data.totalAmount);
            $('#user_today_in').html(data.data.todayIncome);
            $('#user_yes_in').html(data.data.easterdayIncome);
            $('#user_today_ref').html(data.data.todayRaferIncome);
            $('#todays_deposit').html(data.data.todaysRechargeIncome);
            $('#user_order_task').html(data.task);
            if(data.data.task < 1){
                $('button.task_next.btn.btn-success.title').props('disabled', true);
                $('button.task_next.btn.btn-success.title').html('No More Task Today!');
            }
        }
    })
}