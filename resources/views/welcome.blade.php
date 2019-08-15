<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VanLife</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
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
            font-size: 84px;
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
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
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

        <div class="content">
            <div class="title m-b-md">
                VanLife
            </div>

            <!-- ここからコンテンツの表示を行う。 -->
            <!-- 表示領域 -->
            @if (count($stores) > 0)
            <!-- 施設一覧のループ（メインループ） -->
            @foreach ($stores as $store)

            <!-- 施設提供サービスの取得 -->
            @php
            $selectstoreservices = $storeservices
            ->where('storeid',$store->storeid);
            @endphp

            <!-- 施設写真の取得(トップ画像のみ取得) -->
            @php
            $selectstoreimages = $storeimages
            ->where('storeid',$store->storeid)
            ->where('imagedivision',1);
            @endphp

            <!-- 施設イメージのループ -->
            <!-- ここで施設のTOP画像を表示させる。 -->
            @foreach($selectstoreimages as $storeimage)
            <div>画像URL:{{ $storeimage->imageurl }}</div>
            <img src={{ $storeimage->imageurl }}>
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
            <div>住所02:{{$store->storeaddress03}}</div>

            <!-- 施設サービスのループ -->
            <!-- ここで施設のTOP画像を表示させる。 -->
            @foreach($selectstoreservices as $storeservice)
            <!-- アイコン画像の取得 -->
            @php
            $selectservices = $services
            ->where('serviceid',$storeservice->serviceid);
            @endphp
            @foreach($selectservices as $service)
            <div>アイコンURL:{{$service->serviceiconimageurl}}</div>
            <img src={{$service->serviceiconimageurl}}>
            @endforeach

            @endforeach

            @endforeach
            @endif
            <!-- ここまでタスクリスト -->
            <!-- <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div> -->
        </div>
    </div>
</body>

</html>