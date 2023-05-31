@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\kyc\main.css')}}">

<section id="kyc_form">
    <div class="kyc_form_container">
        <form action="">
            <h2 class="main-header">Generate Ticket</h2>

            <h2 style="padding-bottom:2rem" class="header">Email: <span class="title">arsaliftikhar2@gmail.com</span></h2>

            <label class="title" for="">Select Issue</label>
            <div class="input_box">
                <select id="selectIssue" class="title" name="subject">
                    <option value="">--- Select ---</option>
                    <option value="Registration Related Issue">Registration Related Issue</option>
                    <option value="Password Related Issue">Password Related Issue</option>
                    <option value="Deposit Related Issue">Deposit Related Issue</option>
                    <option value="Membership Related Issue">Membership Related Issue</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <label for="" class="title">Message</label>
            <div style="width: 100%" class="input_box">
                <textarea name="" id="" style="width: 100%;height:15rem" placeholder="Message"></textarea>
            </div>

            <div class="btn_group">
                <div class="btn-danger">CANCELED</div>
                <div type="submit" class="btn-success">CONFIRM</div>
            </div>

        </form>
    </div>
</section>

@endsection