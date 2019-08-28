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
            color: #636b6f;
            /* font-family: 'Raleway', sans-serif; */
            font-weight: 100;
            /* color: white; */
            /* height: 100vh; */
            margin: 0 auto;
        }


        .full-height {
            height: 100vh;
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

        .content {
            text-align: center;
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
    </style>
</head>

<body>
        
    @include('parts.header')

    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                施設詳細
            </div>

            <!-- ここからコンテンツの表示を行う。 -->
            <!-- 表示領域 -->

            <!-- 施設無料提供サービスの取得 -->
            @php
            $selectfreestoreservices = $storeservices
            ->where('storeid',$store->storeid)
            ->where('paidserviceflg',0);
            @endphp

            @php
            $selectpaidstoreservices = $storeservices
            ->where('storeid',$store->storeid)
            ->where('paidserviceflg',1);
            @endphp


            <!-- 施設写真の取得(トップ画像のみ取得) -->
            @php
            $selecttopstoreimages = $storeimages
            ->where('storeid',$store->storeid)
            ->where('imagedivision',1);
            @endphp

            <!-- 施設写真の取得(サブ画像のみ取得) -->
            @php
            $selectsubstoreimages = $storeimages
            ->where('storeid',$store->storeid)
            ->where('imagedivision',2);
            @endphp

            <!-- 施設イメージのループ -->
            <!-- ここで施設のサブ画像を表示させる。 -->
            @foreach($selecttopstoreimages as $topstoreimage)
            <div>画像URL:{{ $topstoreimage->imageurl }}</div>
            <img src={{ $topstoreimage->imageurl }}>
            @endforeach

            <!-- 施設メイン情報の表示 -->
            <div>施設名:{{ $store->storename }}</div>
            <div>ユーザーへの一言:{{$store->forusermessage}}</div>
            <div>アピールポイント:{{$store->salespointmessage}}</div>
            <div>websiteURL:{{$store->websiteurl}}</div>
            <div>郵便番号:{{$store->postalcode}}</div>
            <div>県名:{{$store->storeaddress01}}</div>
            <div>住所01:{{$store->storeaddress02}}</div>
            <div>住所02:{{$store->storeaddress03}}</div>

            <!-- 無料施設サービスのループ -->
            <div>無料施設サービス一覧</div>
            @foreach($selectfreestoreservices as $freestoreservice)
            <!-- アイコン画像の取得 -->
            @php
            $selectfreeservices = $services
            ->where('serviceid',$freestoreservice->serviceid);
            @endphp

            @foreach($selectfreeservices as $freeservice)
            <div>アイコンURL:{{$freeservice->serviceiconimageurl}}</div>
            <img src={{$freeservice->serviceiconimageurl}}>
            <div>サービス名:{{$freestoreservice->unitpricename}}</div>
            @endforeach

            @endforeach

            <!-- 有料施設サービスのループ -->
            <div>有料施設サービス一覧</div>
            @foreach($selectpaidstoreservices as $paidstoreservice)
            <!-- アイコン画像の取得 -->
            @php
            $selectpaidservices = $services
            ->where('serviceid',$paidstoreservice->serviceid);
            @endphp

            @foreach($selectpaidservices as $paidservice)
            <div>アイコンURL:{{$paidservice->serviceiconimageurl}}</div>
            <img src={{$paidservice->serviceiconimageurl}}>
            <div>サービス名:{{$paidstoreservice->unitpricename}}</div>
            <div>料金:{{$paidstoreservice->unitprice}}円</div>
            @endforeach

            @endforeach

            <!-- 施設イメージのループ -->
            <!-- ここで施設のサブ画像を表示させる。 -->
            @foreach($selectsubstoreimages as $substoreimage)
            <div>画像URL:{{ $substoreimage->imageurl }}</div>
            <img src={{ $substoreimage->imageurl }}>
            @endforeach

        </div>
    </div>
    <footer>

        <div class="title m-b-md">
            VanLife
        </div>

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">ユーザー登録</a>
            @endauth
        </div>
        @endif

    </footer>
</body>

</html>