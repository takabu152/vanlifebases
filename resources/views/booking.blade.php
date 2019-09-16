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

        a  {
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

        <div class="contents">
            <div class="title m-b-md">
                <table class="table">
                    <!-- <caption>予約一覧</caption> -->
                    <thead>
                        <tr>
                            <th scope="col"><img class="host" src="{{ asset('img/host.png') }}" alt=""></th>
                            <th scope="col"><img class="checkin" src="{{ asset('img/checkin.png') }}" alt=""></th>
                            <th scope="col"><img class="checkout" src="{{ asset('img/checkout.png') }}" alt=""></th>
                            <th scope="col"><img class="pay" src="{{ asset('img/pay.png') }}" alt=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <!-- 施設名をstoresから取得 -->
                        @php
                        $bookingstorenames = $stores
                        ->where('storeid', $booking->storeid);
                        @endphp
                        <tr>
                            @foreach ($bookingstorenames as $bookingstorename)
                            <td><a href="{{ url('storedetail/'.$bookingstorename->storeid) }}.submit()">{{
                                    $bookingstorename->storename }}</td>
                            <td>{{ $booking->checkinday }}</td>
                            <td>{{ $booking->checkoutday }}</td>
                            <td>{{ $booking->paymentmoney }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ここからコンテンツの表示を行う。 -->
            <!-- 表示領域 -->

            <!-- 施設無料提供サービスの取得 -->
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
</body>

</html>