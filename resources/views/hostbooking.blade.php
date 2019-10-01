<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VanLife</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Roboto&display=swap&subset=japanese"
        rel="stylesheet">

    <!-- <Bootstrap> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #808080;
            /* font-family: 'Raleway', sans-serif; */
            font-weight: 100;
            /* height: 100vh; */
            margin: 0 auto;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 55px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        footer {
            position: fixed;
            width: 100%;
            height: 80px;
            /* background-color: white; */
            border-bottom: solid double #9b9999;
            /* color: #FF4848; */
            box-shadow: 2px 0.2px 8px #9b9999;
            padding: 0;
            margin: 0;
            z-index: 10;
        }

        .main-img-box {
            width: 100%;
            height: 700px;
        }

        .main-img {
            object-fit: contain;
        }

        .container {
            top: 232px;
        }

        .contents {
            width: 80%;
        }

        table {
            color: #808080;
        }

        th {
            width: 25%;
            font-size: 24px;
        }

        td {
            font-size: 16px;
        }

        img {
            width: 16%;
        }

        a {
            color: #808080;
        }

        a:hover {
            text-decoration: none;
            color: #808080;
        }
    </style>
</head>

<body>

    @include('parts.header')

    <div class="flex-center position-ref container">
        <a href="{{ url('/hostbooking')}}" class="btn btn-primary">リロード</a>
    </div>
    <div class="flex-center position-ref container">

        <div class="contents">
            <div class="title m-b-md">
                <table class="table">
                    <!-- <caption>ホスト予約確認</caption> -->
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col"><img class="host" src="{{ asset('img/host.png') }}" alt=""></th>
                            <th scope="col">予約状況</th>
                            <th scope="col">ユーザーID</th>
                            <th scope="col"><img class="checkin" src="{{ asset('img/checkin.png') }}" alt=""></th>
                            <th scope="col"><img class="checkout" src="{{ asset('img/checkout.png') }}" alt=""></th>
                            <th scope="col"><img class="pay" src="{{ asset('img/pay.png') }}" alt=""></th>
                            <th scope="col">空室</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ホストの施設予約情報を取得 -->
                        @foreach ($hostbookings as $hostbooking)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ $hostbooking->storename }}</td>
                            @if($hostbooking->bookingstatus === 0)
                            <td>空き状況確認</td>
                            @elseif($hostbooking->bookingstatus === 1)
                            <td>支払URL発行待ち</td>
                            @elseif($hostbooking->bookingstatus === 2)
                            <td>支払URL発行済み</td>
                            @elseif($hostbooking->bookingstatus === 3)
                            <td>支払完了</td>
                            @elseif($hostbooking->bookingstatus === 4)
                            <td>キャンセル申し込み</td>
                            @elseif($hostbooking->bookingstatus === 5)
                            <td>キャンセル承諾</td>
                            @elseif($hostbooking->bookingstatus === 6)
                            <td>キャンセル料支払待ち</td>
                            @elseif($hostbooking->bookingstatus === 7)
                            <td>キャンセル</td>
                            @endif
                            <td>{{ $hostbooking->name }}</td>
                            <td>{{ $hostbooking->checkinday }}</td>
                            <td>{{ $hostbooking->checkoutday }}</td>
                            <td>{{ $hostbooking->paymentmoney }}</td>
                            <!-- 予約ステータスが0のとき空室確認のOK、NGボタン表示 -->
                            @if($hostbooking->bookingstatus === 0)
                            <td>
                                <form action="{{ url('hostbooking/bookingok') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="bookingid" value="{{$hostbooking->bookings_id}}">
                                    <button type="submit" class="btn btn-primary">OK</button>
                                    
                                </form>
                                <form action="{{ url('hostbooking/bookingng') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="bookingid" value="{{$hostbooking->bookings_id}}">
                                    <button type="submit" class="btn btn-danger">NG</button>
                                    
                                </form>
                            </td>
                            <!-- 予約ステータスが7のときNG表示 -->
                            @elseif($hostbooking->bookingstatus === 7)
                            <td>
                                <p>NG</p>
                            </td>
                            <!-- 予約ステータスが0、7以外のときOK表示 -->
                            @else
                            <td>
                                <p>OK</p>
                            </td>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <footer>

        <div class="title m-b-md">
            VanLife
        </div>

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/welcome') }}">Home</a>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">ユーザー登録</a>
            @endauth
        </div>
        @endif

    </footer> --}}

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>



</script>

</body>
</html>