@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\packages\main.css')}}">

<section id="packages">
    @if ($db_data_count < 1)
        <h2 class="main-header text-center mt-5">No Data Found!</h2>
    @endif
    <div class="pachages_wrapper">

        @foreach ($db_data as $item)
            <form class="submit_form"  method="post">
                <div class="box">
                    <div class="submit_form_header">
                        <h2 class="main-header">{{$item['package_name']}}</h2>
                        <p class="title">{{$item['commission']*$item['task']}}% commission daily</p>
                        <p class="title">{{$item['task']}}% task daily</p>
                    </div>
                    <input type="hidden" class="package_id" value="{{$item['id']}}">
                    <div class="body">
                        <h2 class="main-header">${{$item['minAmount']}} - ${{$item['maxAmount']}}</h2>
                        <div class="input_box">
                            <input style="width: 100%" type="number" class="amount" min="{{$admin_data['minDeposit']}}" max="{{$admin_data['maxDeposit']}}" placeholder="${{$item['minAmount']}} - ${{$item['maxAmount']}}" required>
                        </div>
                    </div>
                    <div class="footer">
                        @if ($userData['package_name'] == $item['package_name'])
                            <button style="width: 100%" class="btn-danger" type="submit">Working...</button>
                        @else
                            <button style="width: 100%" class="btn-site" type="submit">Purchase</button>
                        @endif
                    </div>
                </div>
            </form>
        @endforeach

        <div style="display: none" class="payment_box_container">
            <div class="payment_box_wrapper">
                <ion-icon class="close" name="close-circle-outline"></ion-icon>

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
</section>

<script>
    $('.submit_form').submit(function(e){
        e.preventDefault();
        $('.payment_box_container').fadeIn(500);

        let amount = $(this).children('.box').children('.body').children('.input_box').children('.amount').val();
        let id = $(this).children('.box').children('.package_id').val();

        $('#packages .payment_box_container .payment_box_wrapper .box_r .get_id').val(id);
        $('#packages .payment_box_container .payment_box_wrapper .box_r .get_amount').val(amount);
    });
    $('.payment_box_container').click(function(){
        $('.payment_box_container').fadeOut(500);
    });
    $('#packages .payment_box_container .payment_box_wrapper ion-icon.close.md.hydrated').click(function(){
        $('.payment_box_container').fadeOut(500);
    });

    // click payment box
    $('#packages .payment_box_container .payment_box_wrapper .box_r').click(function(){
        // let id = $(this).children('.get_id').val();
        let amount = $(this).children('.get_amount').val();
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

</script>

{{-- script  --}}
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
@endsection
