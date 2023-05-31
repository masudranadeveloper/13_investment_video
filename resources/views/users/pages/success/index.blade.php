@php
    $adminData = App\Models\admin_account::where('id', 1) -> first()
@endphp
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{asset('images/web_logo/'.$adminData['logo'])}}" type="image/x-icon">
  <title>Request Success</title>

  <style>
    body {
      text-align: center;
      padding: 40px 0;
      background: #EBF0F5;
    }
      h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
      }
      p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
      }
    i {
      color: #9ABC66;
      font-size: 100px;
      line-height: 200px;
      margin-left:-15px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
    .checkmark_success{
        animation: animation 1s ease-out forwards;
    }
    a {
        color: white;
        text-decoration: none;
        background: green;
        padding: 1rem;
        border-radius: 7px;
    }
    @keyframes animation{
        0%{
            transform: scale(0.1) rotate(0deg);
        }
        100%{
            transform: scale(1) rotate(360deg);
        }
    }
  </style>
</head>
<body>
    <div class="card">
        <div class="checkmark_success" style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>{{$data['msg']}}</p>
        <br>
        <br>
        <br>
        <a href="{{route('home_show')}}">BACK TO HOME</a>
    </div>
</body>

{{-- script  --}}
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
</html>

