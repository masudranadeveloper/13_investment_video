@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\rank\main.css')}}">k

<section id="rank_view">
    <div class="rank_box_wrapper">
        <div class="box">
            <h2 class="main-header">Next Rank</h2>
            <img src="{{asset('images\packages\black-diamond.png')}}" alt="">
        </div>
        <div class="box">
            <h2 class="main-header">Next Rank</h2>
            <img src="{{asset('images\packages\black-diamond.png')}}" alt="">
        </div>
        <div class="box">
            <div class="header">
                <img src="{{asset('images\packages\black-diamond.png')}}" alt="">
                <h2 class="main-header">Next Rank Status</h2>
            </div>

            <div class="footer">
                <div class="box_inner">
                    <p class="title">Team Sales</p>
                    <p class="title">$1,280.00</p>
                </div>
                <div class="box_inner">
                    <p class="title">Next Level Sale Required</p>
                    <p class="title">$500,000.00</p>
                </div>
                <div class="box_inner">
                    <p class="title">Next Level Sale Required</p>
                    <p class="title">Remaining</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="details_home">
    <div class="recentOrders">
        <table>
            <thead>
                <tr>
                    <td class="title">#NO</td>
                    <td class="title">Username</td>
                    <td class="title">Package Name	</td>
                    <td class="title">Package Price</td>
                    <td class="title">Level</td>
                    <td class="title">Date</td>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection