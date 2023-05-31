@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\networks\team.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section id="network_team_rafer">
    <div class="network_team_rafer_wrapper">
        <div class="header">
            <h2 class="main-header">Direct Team</h2>
        </div>



        <div class="footer">
            <div class="footer_header">
                <a href="{{route('show_1stgen')}}" class="{{Route::is('show_1stgen') ? "btn-success" : "btn-site"}}">1st Genaration</a>
                <a href="{{route('show_2ndgen')}}" class="{{Route::is('show_2ndgen') ? "btn-success" : "btn-site"}}">2nd Genaration</a>
                <a href="{{route('show_3rdgen')}}" class="{{Route::is('show_3rdgen') ? "btn-success" : "btn-site"}}">3rd Genaration</a>
                <a href="{{route('show_4thgen')}}" class="{{Route::is('show_4thgen') ? "btn-success" : "btn-site"}}">4th Genaration</a>
                <a href="{{route('show_5thgen')}}" class="{{Route::is('show_5thgen') ? "btn-success" : "btn-site"}}">5th Genaration</a>
            </div>

            <div class="footer_body">
                @if ($genDataCount < 1)
                    <div class="body">
                        <h2 class="main-header">You Don't have any members in your Direct Team.</h2>
                    </div>
                @endif

                @foreach ($genData as $item)
                    <div class="box">
                        <div class="details">
                            <img src="{{asset('images/users/'.$item['picture'])}}" alt="">
                            <div class="details_content">
                                <h2 class="header">{{$item['userName']}}</h2>
                                <p class="title">{{$item['package_name']}}</p>
                            </div>
                        </div>
                        <div class="main-header">{{$item['totalAmount']}}$</div>
                    </div>
                @endforeach

            </div>
            {{$genData -> links()}}
        </div>

    </div>
</section>

<style>
    a{
        text-decoration: none;
    }
    a.page-link {
        font-size: 1.5rem;
    }
</style>
{{-- script  --}}
<script src="{{asset('js\new\onlin_ofline.js')}}"></script>
<script>
    setInterval(() => {
        online_ofline();
    }, 5000);
    online_ofline();
</script>
@endsection
