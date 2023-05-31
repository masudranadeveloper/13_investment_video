
@extends('users.layout.master')
@section('master')

{{-- <link rel="stylesheet" href="{{asset('css\new\prifile\main.php', 2)}}"> --}}
<input type="hidden" id="proile_id_hidden" value="{{$userData['id']}}">
    <section id="profile_section">
        <div class="profile_settings">

            <div class="profile_box">
                <div class="details_box">
                    <h2 class="main-header">
                        {{$userData['fName']}}
                        {{$userData['lName']}}
                    </h2>
                    <p class="title">{{$userData['city']}}, {{$userData['country']}}</p>
                    <button id="online_ofline" class="active_state"></button>
                </div>
            </div>

            <div class="profile_box">
                <div class="img_bar">
                    <div class="profile_img"></div>
                    <div class="bar_2">
                        <div class="profile_img_cn">
                            <span style="--i:1"></span>
                            <span style="--i:2"></span>
                            <span style="--i:3"></span>
                            <span style="--i:4"></span>
                            <span style="--i:5"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile_box">
                {{-- =====start ========= --}}
                @foreach ($ge1strecentusers as $item)
                    <div class="box invitation_users">
                        <div class="left">
                            <img src="{{asset('images/users/'.$item['picture'], 2)}}" alt="">
                            <div class="info">
                                <h2 class="header">{{$item['userName']}}</h2>
                                <p class="title">1st Genaration</p>
                            </div>
                        </div>
                        <div class="right">
                            <div class="header">{{number_format($item['totalAmount'], 2)}}$</div>
                        </div>
                    </div>
                @endforeach
                {{-- =====start ========= --}}
            </div>

            <div class="profile_box">
                <div class="box_box_wrapper">

                    <div class="box profile_1">
                        <img src="{{asset('images/users/'.$userData['picture'], 2)}}" alt="">
                        <div class="details">
                            <h2 class="header">{{$userData['fName']}} {{$userData['lName']}}</h2>
                            <p class="title">{{$userData['email']}}</p>
                        </div>
                        <li>
                            <p class="title">Total Amount</p>
                            <p class="title">{{number_format($userData['totalAmount'], 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Withdraw</p>
                            <p class="title">{{number_format($userData['totalWithdraw'], 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Deposit</p>
                            <p class="title">{{number_format($userData['totalDeposit'], 2)}}$</p>
                        </li>
                    </div>

                    <div class="box">
                        <img src="{{asset('images/users/1.webp', 2)}}" alt="">
                        <h2 class="main-header">1st Generation</h2>
                        <li>
                            <p class="title">Total Amount</p>
                            <p class="title">{{number_format($ge1strecentusers_amount, 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Withdraw</p>
                            <p class="title">{{number_format($ge1strecentusers_withdraw, 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Deposit</p>
                            <p class="title">{{number_format($ge1strecentusers_deposit, 2)}}$</p>
                        </li>
                    </div>

                    <div class="box">
                        <img src="{{asset('images/users/2.jpg', 2)}}" alt="">
                        <h2 class="main-header">2st Generation</h2>
                        <li>
                            <p class="title">Total Amount</p>
                            <p class="title">{{number_format($ge2ndrecentusers_amount, 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Withdraw</p>
                            <p class="title">{{number_format($ge2ndrecentusers_withdraw, 2)}}$</p>
                        </li>
                        <li>
                            <p class="title">Total Deposit</p>
                            <p class="title">{{number_format($ge2ndrecentusers_deposit, 2)}}$</p>
                        </li>
                    </div>

                </div>
            </div>

        </div>
    </section>

@php
    $userProfile = "../../../images/users/".$userData['picture'];
    // gen
    $gen1st_pic = "../../../images/users/".$gen1st_pic;
    $gen2nd_pic = "../../../images/users/".$gen2nd_pic;
    $gen3rd_pic = "../../../images/users/".$gen3rd_pic;
    $gen4th_pic = "../../../images/users/".$gen4th_pic;
    $gen5th_pic = "../../../images/users/".$gen5th_pic;
@endphp
{{-- style  --}}
<style>
/* background images  */
#profile_section .profile_settings .profile_box .img_bar .profile_img {
    background-image: url(<?php echo $userProfile?>);
}
/* #profile_section .profile_settings .profile_box .img_bar .profile_img_cn span::before {
    background-image: url(../../../images/users/profile.jpg);
} */
/* profile_img_cn */
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span:nth-child(1)::before{
    background-image: url(<?php echo  $gen1st_pic?>);
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span:nth-child(2)::before{
    background-image: url(<?php echo  $gen2nd_pic?>);
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span:nth-child(3)::before{
    background-image: url(<?php echo  $gen3rd_pic?>);
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span:nth-child(4)::before{
    background-image: url(<?php echo  $gen4th_pic?>);
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span:nth-child(5)::before{
    background-image: url(<?php echo  $gen5th_pic?>);
}
/* images  */

section#profile_section {
    padding: 2rem;
}
#profile_section .profile_settings {
  box-shadow: var(--box-shadow);
  border-radius: var(--border-radius);
  margin-top: 4rem;
  margin-bottom: 4rem;
  display: grid;
  padding: 2rem;
  grid-template-columns: repeat(3, 1fr);
  position: relative;
  overflow: hidden;
  position: relative;
}
#profile_section .profile_settings button.active_state{
    width: 15px;
    height: 15px;
    border: none;
    outline: none;
    background: green;
    border-radius: 50%;
    position: absolute;
    top: 7px;
    right: 7px;
}
#profile_section .profile_settings .profile_box .img_bar {
  position: relative;
  margin-top: 6rem;
}
#profile_section .profile_settings .profile_box .img_bar .profile_img {
  height: 10rem;
  width: 10rem;
  background-position: center;
  background-size: cover;
  border-radius: 50%;
  display: block;
  margin: auto;
  border: 5px solid green;
}
#profile_section .profile_settings .profile_box .img_bar .bar_2 {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn {
  height: 17rem;
  width: 17rem;
  border-radius: 50%;
  position: relative;
  -webkit-animation: rotetd_ani 4s linear infinite;
          animation: rotetd_ani 4s linear infinite;
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span {
  border-radius: 50%;
  position: absolute;
  height: 100%;
  width: 100%;
  transform: rotate(calc(72deg * var(--i)));
}
#profile_section .profile_settings .profile_box .img_bar .profile_img_cn span::before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  height: 5rem;
  width: 5rem;
  background-size: cover;
  background-position: center;
  border-radius: 50%;
}
@-webkit-keyframes rotetd_ani {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes rotetd_ani {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
#profile_section .profile_settings .profile_box .details_box .header {
  padding-bottom: 0.6rem;
}
#profile_section .profile_settings .profile_box .invitation_users {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2rem;
  box-shadow: var(--box-shadow);
  border-radius: var(--border-radius);
  margin-bottom: 2rem;
  position: relative;
  overflow: hidden;
}
#profile_section .profile_settings .profile_box .invitation_users .left {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
}
#profile_section .profile_settings .profile_box .invitation_users .left img {
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
  background-size: cover;
}
#profile_section .profile_settings .profile_box .invitation_users::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 0.3rem;
  background-image: linear-gradient(to bottom right, red, yellow);
  z-index: 999;
  top: 0;
  transform: rotate(44deg);
  -webkit-animation: movement 5s linear infinite;
          animation: movement 5s linear infinite;
}
@-webkit-keyframes movement {
  0% {
    right: 100%;
  }
  100% {
    right: -100%;
  }
}
@keyframes movement {
  0% {
    right: 100%;
  }
  100% {
    right: -100%;
  }
}
#profile_section .profile_settings .profile_box .invitation_users:hover {
  box-shadow: var(--box-shadow-inset);
}
#profile_section .profile_settings .profile_box .invitation_users:hover::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 0.4rem;
  background-image: linear-gradient(to bottom right, red, yellow);
  z-index: 999;
  top: 0;
  transform: rotate(44deg);
  -webkit-animation: movement_hover 3s linear infinite;
          animation: movement_hover 3s linear infinite;
  color: red;
}
@-webkit-keyframes movement_hover {
  0% {
    right: -100%;
  }
  100% {
    right: 100%;
  }
}
@keyframes movement_hover {
  0% {
    right: -100%;
  }
  100% {
    right: 100%;
  }
}
#profile_section .profile_settings .box_box_wrapper {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 2rem;
  padding-right: 2rem;
}
#profile_section .profile_settings .box_box_wrapper .box {
  box-shadow: var(--box-shadow);
  padding: 2rem;
  border-radius: var(--border-radius);
  display: flex;
  align-items: center;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}
#profile_section .profile_settings .box_box_wrapper .box .main-header {
  padding-top: 2rem;
  padding-bottom: 4rem;
}
#profile_section .profile_settings .box_box_wrapper .box img {
  width: 5rem;
  height: 5rem;
  border-radius: 50%;
}
#profile_section .profile_settings .box_box_wrapper .box li {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: start;
  padding-bottom: 1rem;
  padding-top: 1rem;
  border-bottom: 1px solid var(--border);
}
#profile_section .profile_settings .box_box_wrapper .box li:first-child {
  padding-top: 0;
}
#profile_section .profile_settings .box_box_wrapper .box li:last-child {
  padding-bottom: 0;
  border-bottom: none;
}
#profile_section .profile_settings .box_box_wrapper .profile_1 .details {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding-top: 2rem;
}
#profile_section .profile_settings .box_box_wrapper .profile_1 .details .title {
  padding-top: 1rem;
  padding-bottom: 4rem;
}
#profile_section .profile_settings .box_box_wrapper .profile_1 li {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: start;
  padding-bottom: 2rem;
}
#profile_section .profile_settings .box_box_wrapper .profile_1 li:last-child {
  padding-bottom: 0;
}
#profile_section .profile_settings .box_box_wrapper .box::before {
  position: absolute;
  content: "";
  width: 200%;
  height: 0.3rem;
  background-image: linear-gradient(to bottom right, red, yellow);
  z-index: 999;
  top: 50%;
  transform: rotate(44deg);
  -webkit-animation: box_1 3s linear infinite;
          animation: box_1 3s linear infinite;
}
@-webkit-keyframes box_1 {
  0% {
    transform: rotate(44deg) translateY(22rem);
  }
  100% {
    transform: rotate(44deg) translateY(-22rem);
  }
}
@keyframes box_1 {
  0% {
    transform: rotate(44deg) translateY(22rem);
  }
  100% {
    transform: rotate(44deg) translateY(-22rem);
  }
}
#profile_section .profile_settings .box_box_wrapper .box:hover {
  box-shadow: var(--box-shadow-inset);
}
#profile_section .profile_settings .box_box_wrapper .box:hover::before {
  -webkit-animation: box_1_hover 2s linear infinite;
          animation: box_1_hover 2s linear infinite;
}
@-webkit-keyframes box_1_hover {
  0% {
    transform: rotate(44deg) translateY(-22rem);
  }
  100% {
    transform: rotate(44deg) translateY(22rem);
  }
}
@keyframes box_1_hover {
  0% {
    transform: rotate(44deg) translateY(-22rem);
  }
  100% {
    transform: rotate(44deg) translateY(22rem);
  }
}
#profile_section .profile_settings .profile_box:nth-child(3) {
  grid-row: 1/3;
  grid-column: 3/4;
}
#profile_section .profile_settings .profile_box:nth-child(4) {
  grid-column: 1/3;
}

@media (max-width: 1300px) {
  #profile_section .profile_settings {
    grid-template-columns: repeat(2, 1fr);
  }
  #profile_section .profile_settings .profile_box:nth-child(1) {
    grid-column: 1/2;
  }
  #profile_section .profile_settings .profile_box:nth-child(2) {
    grid-column: 2/3;
  }
  #profile_section .profile_settings .profile_box:nth-child(3) {
    grid-column: 1/4;
    grid-row: none;
  }
  #profile_section .profile_settings .profile_box:nth-child(4) {
    grid-column: 1/4;
  }
  #profile_section .profile_settings .box_box_wrapper {
    grid-template-columns: repeat(2, 1fr);
    padding-right: 0;
  }
  #profile_section .profile_settings .profile_box .img_bar {
    margin-bottom: 6rem;
  }
}
@media (max-width: 425px) {
  #profile_section .profile_settings {
    grid-template-columns: repeat(1, 1fr);
  }
  #profile_section .profile_settings .profile_box:nth-child(1) {
    grid-column: 1/4;
  }
  #profile_section .profile_settings .profile_box:nth-child(2) {
    grid-column: 1/4;
  }
  #profile_section .profile_settings .profile_box:nth-child(3) {
    grid-column: 1/4;
    grid-row: 3/3;
  }
  #profile_section .profile_settings .profile_box:nth-child(4) {
    grid-column: 1/4;
  }
  #profile_section .profile_settings .box_box_wrapper {
    grid-template-columns: repeat(1, 1fr);
    padding-right: 0;
    margin-top: 4rem;
  }
  #profile_section .profile_settings .profile_box .img_bar {
    margin-bottom: 8rem;
  }
}/*# sourceMappingURL=main.css.map */
</style>

<script src="{{asset('js\new\onlin_ofline.js', 2)}}"></script>
{{-- script  --}}
<script>

    setInterval(() => {
        online_ofline();
        online_st();
    }, 5000);
    const online_st = () => {
        // ajax
        $.ajax({
            "url" : url+"api/home/online_or_ofline_st",
            "method" : "POST",
            "data" : {
                "id" : $('#proile_id_hidden').val()
            },
            success:function(data){
                console.log(data)
                if(data.st == "online"){
                    $('#online_ofline').css('display', 'block');
                }else{
                    $('#online_ofline').css('display', 'none');
                }
            }
        })
    };

    online_st();
        online_ofline();
</script>
@endsection
