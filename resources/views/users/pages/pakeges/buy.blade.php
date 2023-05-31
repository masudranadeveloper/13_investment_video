@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\packages\buy.css')}}">

<section id="payment_form">
    <form action="{{route('api_users_deposit_insert')}}" method="post" id="recharge_payment" enctype="multipart/form-data">
        <div class="payment_form_wrapper">
            <div class="header">
                <h2 class="main-header">Pay with @if($method == "1") Bkash @elseif($method == "2") Nagad @elseif($method == "3") Rocket @else USDT @endif</h2>
            </div>

            <div class="body">
                <div class="body_top">
                    <h2 class="header">Your account blance now : <button class="btn-info">{{$userData['totalAmount']}}</button></h2>
                </div>

                <div class="body_middle">
                    <div class="body_middle_content_header">
                        <div class="body_middle_content_header_left">
                            <div class="box">
                                <span class="title">
                                    To
                                </span>
                                <span style="font-weight: bold" class="title">
                                    @if($method != "4") Admin @else {{$admin_data['usdt_account_name']}} @endif
                                </span>
                            </div>

                            <div class="box">
                                <span class="title">
                                    Invoice Title
                                </span>
                                <span style="font-weight: bold" class="title">
                                    New Package
                                </span>
                            </div>

                        </div>

                        <div class="body_middle_content_header_right">

                            <div class="box">
                                <span class="title">
                                    Date
                                </span>
                                <span style="font-weight: bold" class="title">
                                    2022-10-12
                                </span>
                            </div>

                            <div class="box">
                                <span class="title">
                                    Amount
                                </span>
                                <span style="font-weight: bold" class="title">
                                    @if ($dollar_price == "1")
                                        ${{$amount * $dollar_price}}
                                    @else
                                        ৳{{$amount * $dollar_price}}
                                    @endif
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="body_middle_content_body">
                        <h2 class="title">Please send your payment to the following address</h2>
                        @if($method == "1")
                            <img src="{{asset('images\packages\qrcode.png')}}" alt="">
                        @elseif($method == "2")
                            <img src="{{asset('images\packages\qrcode.png')}}" alt="">
                        @elseif($method == "3")
                            <img src="{{asset('images\packages\qrcode.png')}}" alt="">
                        @else
                            <img src="{{asset('images\packages\qrcode.png')}}" alt="">
                        @endif
                    </div>

                    <div class="body_middle_content_footer">
                        <div class="body_middle_content_footer_first">
                            <h2 class="main-header">
                                @if($method == "1")
                                    Our Bkash Number
                                @elseif($method == "2")
                                    Our Nagad Number
                                @elseif($method == "3")
                                    Our Rocket Number
                                @else
                                    Our USDT Address
                                @endif
                            </h2>
                            <p style="font-weight: bold" class="title">
                                @if($method == "1")
                                    {{$admin_data['bkash_number']}}
                                    <br>
                                    <span style="margin-top: 1rem;display:block" class="title">Send Money</span>
                                @elseif($method == "2")
                                    {{$admin_data['nagad_number']}}
                                    <br>
                                    <span style="margin-top: 1rem;display:block" class="title">Send Money</span>
                                @elseif($method == "3")
                                    {{$admin_data['rocket_number']}}
                                    <br>
                                    <span style="margin-top: 1rem;display:block" class="title">Send Money</span>
                                @else
                                    {{$admin_data['usdt_account_address']}}
                                @endif
                            </p>
                        </div>
                        <div class="body_middle_content_footer_secound">
                            <h2 class="main-header">Amount To Pay</h2>
                            <p class="title">
                                @if ($dollar_price == "1")
                                    ${{$amount * $dollar_price}}
                                @else
                                    ৳{{$amount * $dollar_price}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="body_bottom">
                    <p class="title">*Pay Exact Amount And Enter Transaction Id Here</p>
                    <div class="input_box">
                        <input type="text" name="tranx" placeholder="Enter tranxID..." required>
                    </div>
                </div>
                <div class="body_bottom">
                    <p class="title">*Pay Exact Amount And Enter Transaction Images Here</p>
                    <div class="input_box">
                        <input type="file" name="img" required>
                    </div>
                </div>
            </div>

            {{-- hidden input  --}}
            <input type="hidden" name="amount" value="@if($dollar_price == "1"){{$amount * $dollar_price}}@else{{$amount * $dollar_price}}@endif">
            <input type="hidden" name="method" value="@if($method == "1")Bkash @elseif($method == "2")Nagad @elseif($method == "3")Rocket @else USDT @endif">
            {{-- <input type="hidden" id="deposit_orderid" value="{{time()}}"> --}}
            {{-- <input type="hidden" id="deposit_date" value="{{date('d M, Y h:i:s a')}}"> --}}

            <div class="footer">
                <a href="{{route('package_show')}}" class="btn-site">CANCELED</a>
                <button id="payment_form_confirm" class="btn-site" type="submit">CONFIRM</button>
            </div>
        </div>

    </form>
</section>

{{-- <script>
    $('#recharge_payment').submit(function(e){
        e.preventDefault();

        $('#payment_form_confirm').html('Loadding...');

        $.ajax({
            "method" : "post",
            "url" : url+"api/users/deposit/insert",
            "data" : {
                "amount" : $('#deposit_amount').val(),
                "tranx" : $('#enter_tranxID').val(),
                // "orderID" : $('#deposit_orderid').val(),
                "method" : $('#deposit_method').val(),
                // "date" : $('#deposit_date').val()
            },
            success:function(data){
                if(data.st == true){
                    window.location.href=url+"success?msg=Your recharge request successfully done!";
                    $('#payment_form_confirm').html('Success');
                }else{
                    $('#payment_form_confirm').html('Try Again');
                }
            }
        })
    });
</script> --}}
{{-- script  --}}
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
@endsection
