<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


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
            margin: 0;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            background-color: white;
            border-bottom: solid double #9b9999;
            color: #FD7B51;
            font-weight: bold;
            box-shadow: 2px 0.2px 8px #9b9999;
            padding: 0;
            margin: 0;
            z-index: 10;
        }

        h2 {
            font-weight: bold;
            text-shadow: 1px 1px 1px gray;
        }

        .full-height {
            /* height: 100vh; */
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
            top: 25px;
        }

        .main-container {
            text-align: center;
            position: relative;
            top: 80px;
        }

        .main-container-contents {
            width: 1120px;
        }

        .main-container-contents h2 {
            text-align: left;
        }

        .main-container-contents p {
            text-align: right;
        }

        .mainImg {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 5px;
            filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.4));
        }

        .title {
            font-size: 55px;
            left: 120px;
            /* text-shadow: 1px 2px 1px; */
            position: absolute;
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
            text-align: left;
        }

        ul {
            list-style-type: none;
            float: left;
        }

        li {
            float: left;
        }

        a:hover {
            opacity: 0.5;
        }

        .sub-message {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="flex-center position-ref full-height">

        <header>

            <div class="title m-b-md">
                VanLifeBases
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

        </header>

        <div class="main-container">

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
            <div class="main-container-contents">
                <form action="{{ url('storedetail/'.$store->storeid) }}" method="GET">
                    {{ csrf_field() }}
                    <button type="submit" class="btn">
                        <img class="mainImg" src={{ $storeimage->imageurl
                        }}></button>
                </form>
                <div class="imgUrl">
                    <p>画像URL:{{ $storeimage->imageurl }}</p>
                </div>
                @endforeach

                <!-- 施設メイン情報の表示 -->
                <div>
                    <h2>{{ $store->storename }}</h2>
                </div>
                <div class="sub-message"><a>{{$store->websiteurl}}</a></div>
                <div class="sub-message"><span>Welcom message</span>{{$store->forusermessage}}</div>
                <div class="sub-message">アピールポイント:{{$store->salespointmessage}}</div>
                <div class="sub-message">郵便番号:{{$store->postalcode}}</div>
                <div class="sub-message">県名:{{$store->storeaddress01}}</div>
                <div class="sub-message">住所01:{{$store->storeaddress02}}</div>
                <div class="sub-message">住所02:{{$store->storeaddress03}}</div>

                <!-- 施設サービスのループ -->
                <!-- ここで施設のTOP画像を表示させる。 -->
                @foreach($selectstoreservices as $storeservice)
                <!-- アイコン画像の取得 -->
                @php
                $selectservices = $services
                ->where('serviceid',$storeservice->serviceid);
                @endphp

                @foreach($selectservices as $service)
                <div>
                    <ul>
                        <li>
                            <!-- <p>アイコンURL:{{$service->serviceiconimageurl}}</p> -->
                            <img src={{$service->serviceiconimageurl}}>
                        </li>
                    </ul>
                </div>

                @endforeach

                @endforeach

                <!-- {{-- 施設詳細画面へ飛ぶリンクを設定 --}} -->
                <!-- 更新ボタン -->
                <!-- <form action="{{ url('storedetail/'.$store->storeid) }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">detail</button>
            </form> -->

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
        <div id="app">
            <!--「appというidのdiv要素」の中にcomponentの設置-->
            <!-- <example-component></example-component> -->
            <header-component></header-component>
        </div>
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>

</html>