@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\task\main.css')}}">

<section id="task_container">
    <div class="task_manager">
        <video id="myVideo" class="content iframe d-none" src=""></video>

        <img class="content img" src="{{asset('images\task\task.png')}}" alt="">
    </div>

    <div class="box1">
        <p style="text-align:center" class="title">If You Are Born Poor It’s Not Your Mistake, But If You Die Poor It’s Your Mistake</p>
    @if (strtotime($userData['created_at']) + 604800 > time() OR $package_data_first['maxAmount'] < $userData['totalAmount'])
            <button id="next_task" class="btn-site">Next Task </button>
        @else
            <button class="btn-danger">Free 7 Dyas Has Expired!</button>
        @endif
    </div>

    <div class="box2">
        <li>
            <span class="header">Total Amount</span>
            <span class="title" id="user_total_amount">{{Number_format($userData['totalAmount'], 2)}}$</span>
        </li>

        <li>
            <span class="header">Todays Income</span>
            <span class="title" id="user_today_in">{{$userData['todayIncome']}}$</span>
        </li>

        <li>
            <span class="header">Yesterday Income</span>
            <span class="title" id="user_yes_in">{{$userData['easterdayIncome']}}$</span>
        </li>

        <li>
            <span class="header">Todays Genaration Bonus</span>
            <span class="title" id="user_today_ref">{{$userData['todayRaferIncome']}}$</span>
        </li>

        <li>
            <span class="header">Todays Refarel Bonus</span>
            <span class="title" id="user_yes_ref">{{$userData['todaysRechargeIncome']}}$</span>
        </li>

        <li>
            <span class="header">Order Remaning</span>
            <span class="title">@if($userData['task'] > 1) <span id="user_order_task">{{$userData['task']}}</span> @else {{$hours_left}} hours later @endif</span>
        </li>
    </div>
</section>

{{-- task collect  --}}
<div class="task_collect_wrapper d-none">
    <div class="task_collect_container">
        <img id="yt_img" src="{{asset('images\task\yt_img\1.PNG')}}" alt="">
        <h2 class="header" id="yt_title"></h2>
        <h2 class="title">During Time : <span id="yt_chanel_name"></span></h2>
        <h2 class="title">Earning : <span id="total_earning">$ @php echo ($userData['todaysAmount']/100)*$package_data['commission'] @endphp</span></h2>
        <button class="collect_earning">Collect Your Earning</button>
    </div>
</div>
{{-- script  --}}
<script src="{{asset('js\new\task\main.js')}}"></script>
{{-- script  --}}
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
@endsection
