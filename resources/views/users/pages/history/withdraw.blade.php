@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\new\networks\team.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section id="network_team_rafer">
    <div class="network_team_rafer_wrapper">
        <div class="header">
            <h2 class="main-header">Withdraw History</h2>
        </div>

        {{-- <div class="body">
            <h2 class="header">You Don't have any members in your Direct Team.</h2>
        </div> --}}

        <div class="footer">
            <div class="footer_header">
                <div class="footer_header">
                    <a href="{{route('show_withdraw_history_pending')}}" class="{{Route::is('show_withdraw_history_pending') ? "btn-success" : "btn-site"}}">Under Pending</a>
                    <a href="{{route('show_withdraw_history_success')}}" class="{{Route::is('show_withdraw_history_success') ? "btn-success" : "btn-site"}}">Success</a>
                    <a href="{{route('show_withdraw_history_rejected')}}" class="{{Route::is('show_withdraw_history_rejected') ? "btn-success" : "btn-site"}}">Rejected</a>
                </div>
            </div>

            <div class="footer_body">
                @if ($historyDataCount < 1)
                    <div class="body">
                        <h2 class="main-header">You Don't have any withdraw history.</h2>
                    </div>
                @endif

                @foreach ($historyData as $item)
                    <div class="box">
                        <div class="details">
                            @php echo $icon; @endphp
                            <div class="details_content">
                                <h2 class="header">Method : {{$item['Method']}}</h2>
                                <p class="title">Payment Received Address : {{$item['Address']}}</p>
                            </div>
                        </div>
                        <div class="main-header">{{$item['amount']}}@if($item['method'] == "USDT") $ @else ৳ @endif</div>
                    </div>
                @endforeach

            </div>
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
