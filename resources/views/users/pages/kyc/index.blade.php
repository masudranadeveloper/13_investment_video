@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\kyc\main.css')}}">

<section id="kyc_form">
    <div class="kyc_form_container">
        <form action="">
            <h2 class="main-header">Upload Document</h2>


            <label class="title" for="">Select Document Type</label>
            <div class="input_box">
                <select style="width: 100%" id="documentType" class="title" name="select_type">
                    <option value="">Select Document Type</option>
                    <option value="national_id">National Id</option>
                    <option value="driving_licence">Driving Licence</option>
                    <option value="passport">Passport</option>
                </select>
            </div>

            <label for="" class="title">Personal Picture <span style="color: red">(Only jpg and png files are allowed)</span></label>
            <div style="width: 100%" class="input_box">
                <input type="file" name="" id="">
            </div>

            <label for="" class="title">Front Side <span style="color: red">(Only jpg and png files are allowed)</span></label>
            <div style="width: 100%" class="input_box">
                <input type="file" name="" id="">
            </div>

            <label for="" class="title">Back Side <span style="color: red">(Only jpg and png files are allowed)</span></label>
            <div style="width: 100%" class="input_box">
                <input type="file" name="" id="">
            </div>

            <label for="" class="title">Enter ID Number</label>
            <div class="input_box">
                <input style="width: 100%" type="text" name="" id="">
            </div>

            <label for="" class="title">Issuance Date</label>
            <div class="input_box">
                <input type="date" name="" id="">
            </div>

            <label for="" class="title">Expiry Date</label>
            <div class="input_box">
                <input type="date" name="" id="">
            </div>

            <label for="" class="title">Password</label>
            <div class="input_box">
                <input style="width: 100%" type="password" name="" id="">
            </div>

            <div class="btn_group">
                <div class="btn-danger">CANCELED</div>
                <div type="submit" class="btn-success">CONFIRM</div>
            </div>

        </form>
    </div>
</section>

@endsection