@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\home\main.css')}}">

<div id="deshbord_users">
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div class="card_children">
                <div style="width: 100%">
                    <div style="text-align: center" class="numbers main-header">{{number_format($userData['totalAmount'], 2)}}$</div>
                    <div style="text-align: center" class="title">Total Amount</div>

                </div>
            </div>

            <div class="icon">
                <ion-icon class="headericon-1" name="bar-chart-outline"></ion-icon>
            </div>

        </div>
        <div id="recharge_now" class="card">

            <div class="card_children">
                <div>
                    {{-- <div class="numbers main-header">1,504$</div> --}}
                    <div class="title">Recharge Now</div>

                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="icon">
                <ion-icon class="headericon-2" name="wallet-outline"></ion-icon>
            </div>

        </div>

        <a href="{{route('withdraw_show')}}" class="card">

            <div class="card_children">
                <div>
                    {{-- <div class="numbers main-header">1,504$</div> --}}
                    <div class="title">Withdraw Now</div>

                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="icon">
                <ion-icon class="headericon-3" name="card-outline"></ion-icon>
            </div>

        </a>

        <a href="{{route('profile_show', ['id' => $userData['id']])}}" class="card">

            <div class="card_children">
                <div>
                    <div class="title">My Profile</div>

                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="icon">
                <ion-icon class="headericon-4" name="person-circle-outline"></ion-icon>
            </div>

        </a>

    </div>
    <!-- ================ users details  ================= -->

    <div style="grid-template-columns: repeat(2, 1fr);" class="users_details">

        <div class="box">
            <div class="header">
                <h2 class="main-header">Withdrawals</h2>
            </div>
            <div class="footer">
                <ul>
                    <li><span class="title">Approved</span> <span class="title">Pending</span></li>
                    <li><span class="title">${{$total_success_with}}</span> <span class="title">${{$total_pend_with}}</span></li>
                </ul>
            </div>
        </div>

        <div class="box">
            <div class="header">
                <h2 class="main-header">Recharge</h2>
            </div>
            <div class="footer">
                <ul>
                    <li><span class="title">Approved</span> <span class="title">Pending</span></li>
                    <li><span class="title">${{$total_success_recharge}}</span> <span class="title">${{$total_pend_recharge}}</span></li>
                </ul>
            </div>
        </div>

        <div class="box">
            <div class="header">
                <h2 class="main-header">Gen Commission</h2>
            </div>
            <div class="footer">
                <ul>
                    <li><span class="title">Total</span> <span class="title">Today</span></li>
                    <li><span class="title">${{$userData['totalGenCommission']}}</span> <span class="title">${{$userData['todaysRechargeIncome']}}</span></li>
                </ul>
            </div>
        </div>

        <div class="box">
            <div class="header">
                <h2 class="main-header">Refar Commission</h2>
            </div>
            <div class="footer">
                <ul>
                    <li><span class="title">Total</span> <span class="title">Today</span></li>
                    <li><span class="title">${{$userData['totalRechargeCommission']}}</span> <span class="title">${{$userData['todayRaferIncome']}}</span></li>
                </ul>
            </div>
        </div>

    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details_home">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2 class="main-header">Login History</h2>
                <a class="btn-info">Lastest 5</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td class="header">IP</td>
                        <td class="header">City</td>
                        <td class="header">PostalCode</td>
                        <td class="header">Region</td>
                        <td class="header">Country</td>
                        <td class="header">Date</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recent_login as $item)
                        <tr>
                            <td class="title">{{$item['ip']}}</td>
                            <td class="title">{{$item['city']}}</td>
                            <td class="title">{{$item['postal']}}</td>
                            <td class="title">{{$item['region']}}</td>
                            <td class="title">{{$item['country']}}</td>
                            <td class="title">{{$item['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details_home">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2 class="main-header">Recharge History</h2>
                <a class="btn-info">Lastest 5</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td class="header">Sr. Num</td>
                        <td class="header">Amount</td>
                        <td class="header">Method</td>
                        <td class="header">TranxID</td>
                        <td class="header">Status</td>
                        <td class="header">Date</td>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $serNum = 0;
                    @endphp
                    @foreach ($recent_recharge as $item)
                    @php
                        $serNum ++;
                    @endphp
                        <tr>
                            <td class="title">{{$serNum}}</td>
                            <td class="title">{{$item['amount']}}</td>
                            <td class="title">{{$item['method']}}</td>
                            <td class="title">{{$item['tranx']}}</td>
                            <td class="title">{{$item['st']}}</td>
                            <td class="title">{{$item['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- website_notification --}}
    <div id="website_notification">
        <div class="container">
            <div class="header-content">
                <h2 class="main-header">
                    @php
                        echo $admin_data['home_notice_header'];
                    @endphp
                </h2>
                <span id="website_notification_close" class="main-header"><ion-icon name="close-circle-outline"></ion-icon></span>
            </div>
            <div class="body">
                @php
                    echo $admin_data['home_notice_content'];
                @endphp
            </div>
            <div class="footer">
                <h2 class="main-header">Thank You 😃</h2>
            </div>
        </div>
    </div>
    {{-- recharge_hide_form --}}
    <div style="display: none" id="recharge_hide_form">
        <div class="container">
            <form id="recharge_info_form" action="" method="post">
                <div class="box">
                    <span id="recharge_hide_form_close" class="main-header"><ion-icon name="close-circle-outline"></ion-icon></span>
                    <h2 class="main-header">Recharge Form</h2>
                    <div class="input_box">
                        <input type="number" style="width: 100%" min="{{$admin_data['minDeposit']}}" max="{{$admin_data['maxDeposit']}}" name="" id="recharge_amount" placeholder="Inter your amount...">
                    </div>
                    <button type="submit" class="next btn-success">Next</button>
                </div>
            </form>
        </div>
    </div>
    {{-- payment method  --}}
    <div style="display: none" class="payment_box_container">
        <div class="payment_box_wrapper">
            <span id="payment_method_closs"><ion-icon  name="close-circle-outline"></ion-icon></span>

            @if (!empty($admin_data['bkash_number']))
                <div class="box_r">
                    <input type="hidden" class="get_id">
                    <input type="hidden" class="get_amount">
                    <img src="{{asset('images\payment\bkash.svg')}}" alt="">
                    <h2 class="main-header">Pay With Bkash</h2>
                </div>
            @endif

            @if (!empty($admin_data['nagad_number']))
                <div class="box_r">
                    <input type="hidden" class="get_id">
                    <input type="hidden" class="get_amount">
                    <img src="{{asset('images\payment\nagad.png')}}" alt="">
                    <h2 class="main-header">Pay With Nagad</h2>
                </div>
            @endif

            @if (!empty($admin_data['rocket_number']))
                <div class="box_r">
                    <input type="hidden" class="get_id">
                    <input type="hidden" class="get_amount">
                    <img src="{{asset('images\payment\rocket.png')}}" alt="">
                    <h2 class="main-header">Pay With Rocket</h2>
                </div>
            @endif

            @if (!empty($admin_data['usdt_address']))
                <div class="box_r">
                    <input type="hidden" class="get_id">
                    <input type="hidden" class="get_amount">
                    <img src="{{asset('images\payment\usdt.png')}}" alt="">
                    <h2 class="main-header">
                        Pay With USDT
                    </h2>
                </div>
            @endif

        </div>
    </div>
</div>


<script src="{{asset('js\new\home\main.js')}}"></script>
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>

{{-- script  --}}
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
@endsection
