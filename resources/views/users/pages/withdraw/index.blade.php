@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\withdraw\main.css')}}">

<h2 style="text-align:center;margin-top:4rem" class="main-header">Withdrawal form</h2>
<section id="withdraw_request">
    <div class="withdraw_request_wrapper">
        <form id="withdraw_form_submit" action="" method="post">
            <p class="title">To Request Your Withdrawal, Please fill the following form.</p>

            <label for="" class="title">Available Balance</label>
            <div style="background: var(--border)" class="input_box">
                <input style="width: 100%" type="text" disabled placeholder="{{$userData['totalAmount']}}$">
            </div>

            <label for="" class="title">Withdraw Amount <span id="WIthdraw_payment_amount_syne">($)</span> </label>
            <div class="input_box">
                <input id="withdraw_amount" min="{{$db_data['minWithdraw']}}" max="{{$db_data['maxWithdraw']}}" style="width: 100%" type="number" name="" placeholder="Withdraw amount..." required>
                <input id="withdraw_amount_hidden" style="width: 100%" type="hidden" value="">
            </div>

            <label for="" class="title">TAX Amount <span id="tax_amount_symble">($)</span></label>
            <div style="background: var(--border)" class="input_box">
                <input id="tax_amount" style="width: 100%" type="text" disabled placeholder="$0">
                <input id="tax_amount_hidden" style="width: 100%" type="hidden" value="">
            </div>

            <label  for="" class="title">Withdraw Mode</label>
            <div class="input_box">
                <select id="withdraw_mode" style="width: 100%" required>
                    @if (!empty($db_data['withdraw_usdt_address']))
                        <option value="USDT">USDT</option>
                    @endif

                    @if (!empty($db_data['withdraw_bkash_number']))
                        <option value="Bkash">Bkash</option>
                    @endif

                    @if (!empty($db_data['withdraw_nagad_number']))
                        <option value="Nagad">Nagad</option>
                    @endif

                    @if (!empty($db_data['withdraw_rocket_number']))
                        <option value="Rocket">Rocket</option>
                    @endif
                </select>
            </div>

            <label for="" class="title">Your account address</label>
            <div class="input_box">
                <input style="width: 100%" type="text" name="" id="account_address" placeholder="Enter address..." required>
            </div>

            <label for="" class="title">Password</label>
            <div style="margin-bottom:0;" class="input_box">
                <input style="width: 100%" type="text" name="" id="withdraw_password" placeholder="Password" required>
            </div>
            <p id="withdraw_password_error" style="margin-bottom:2rem; color:red" class="title"></p>
            {{-- hidden val  --}}
            <input id="dollar_rate" type="hidden" value="{{$db_data['dollar_rate']}}">
            <input id="tax_commission_rate" type="hidden" value="{{$db_data['withdraw_charge']}}">
            <input id="min_withdrw_re" type="hidden" value="{{$db_data['minWithdraw']}}">
            <input id="max_withdrw_re" type="hidden" value="{{$userData['totalAmount']}}">

            <div class="btn-group">
                <button class="btn-danger">CANCELED</button>
                <button id="form_submit_btn" type="submit" class="btn-success">CONFIRM</button>
            </div>
        </form>
    </div>
</section>

{{-- script  --}}
<script>
    $('#withdraw_mode').change(function(){
        let valudation = $('#withdraw_mode').val();
        check_payment_method(valudation);
    });
    // check method function
    const check_payment_method = (valudation) => {
        if(valudation == "USDT"){
            $('#withdraw_amount').val('00');
            $('#tax_amount').val("00");
            $('#WIthdraw_payment_amount_syne').html('$');
            // min w req
            $('#withdraw_amount').attr('min', $('#min_withdrw_re').val());
            // max
            $('#withdraw_amount').attr('max', $('#max_withdrw_re').val());

            $('#tax_amount_symble').html("($)");
        }else{
            $('#withdraw_amount').val('00');
            $('#tax_amount').val("00");
            $('#WIthdraw_payment_amount_syne').html('Doller Rate '+$('#dollar_rate').val()+"(৳)");
            // min w req
            let with_bn_mi = Number($('#min_withdrw_re').val()*$('#dollar_rate').val());
            $('#withdraw_amount').attr('min', with_bn_mi);
            // max
            let with_bn_max = Number($('#max_withdrw_re').val()*$('#dollar_rate').val());
            $('#withdraw_amount').attr('max', with_bn_max);

            $('#tax_amount_symble').html("(৳)");

        }
    }

    // withdraw_amount
    $('#withdraw_amount').keyup(function(){
        $('#withdraw_amount_hidden').val($('#withdraw_amount').val());
        // withdraw_commission
        let tax_cl = Number((Number($('#withdraw_amount').val())/100)*Number($('#tax_commission_rate').val())).toFixed(2);
        $('#tax_amount_hidden').val(tax_cl);
        $('#tax_amount').val(tax_cl);
        let valudation = $('#withdraw_mode').val();
        if(valudation == "USDT"){
            $('#tax_amount_symble').html("($)");
        }else{
            $('#tax_amount_symble').html("(৳)");
        }
    });

    // form submit
    $('#withdraw_form_submit').submit(function(e){
        e.preventDefault();

        $('#form_submit_btn').html('Loadding...');
        $('#withdraw_password_error').html("");

        $.ajax({
            "method" : "post",
            "url" : url+"api/users/withdraw/insert",
            "data" : {
                "amount" : $('#withdraw_amount_hidden').val(),
                "address" : $('#account_address').val(),
                "method" : $('#withdraw_mode').val(),
                "tax" : $('#tax_amount_hidden').val(),
                "password" : $('#withdraw_password').val(),
            },
            success:function(data){
                if(data.st == true){
                    window.location.href=url+"success?msg=Your withdraw request successfully done!";
                    $('#form_submit_btn').html('Success');
                }else{
                    $('#form_submit_btn').html('Try Again');
                    $('#withdraw_password_error').html(data.password);
                }
            }
        })

    });

</script>
@endsection
