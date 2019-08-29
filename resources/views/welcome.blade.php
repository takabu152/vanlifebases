<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


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


        h2 {
            text-shadow: 1px 1px 1px gray;
        }

        .main-container {
            text-align: center;
            position: relative;
            top: 100px;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .main-container-contents {
            width: 600px;
            height: 500px;
            position: relative;
            float: left;
        }

        .main-container-contents h2 {
            text-align: left;
            font-size: 30px;
        }

        .main-container-contents p {
            text-align: right;
        }

        .main-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 5px;
            filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.4));
        }

        ul {
            list-style-type: none;
            float: left;
            margin: 0;
            padding: 0;
        }

        li {
            float: left;
            display: flex;
        }

        .sub-message {
            text-align: left;
        } 

        .icon-img-contents {
            width: 35%;
        }

    </style>
</head>

<body>
  
        @include('parts.header')

        <div class="main-container">

            <div class="main-container-img">
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
            <!-- {{-- 施設詳細画面へ飛ぶリンクを設定 --}} -->
            @foreach($selectstoreimages as $storeimage)
            <div class="main-container-contents">
                <form action="{{ url('storedetail/'.$store->storeid) }}" method="GET">
                    {{ csrf_field() }}
                    <button type="submit" class="btn">
                        <img class="main-img" src={{ $storeimage->imageurl
                        }}></button>
                </form>

                <!-- ここで施設のTOP画像を表示させる。 -->
                <div class="img-url">
                    <p>画像URL:{{ $storeimage->imageurl }}</p>
                </div>
                @endforeach



                <!-- 施設メイン情報の表示 -->
                <div class="main-container-message">
                        <h2><strong>{{ $store->storename }}</strong>【{{$store->storeaddress01}}】</h2>
                        <h3 class="sub-message"><strong>Welcom message:</strong>{{$store->forusermessage}}</h3>
                        <div class="sub-message"><a>{{$store->websiteurl}}</a></div>
                        {{-- <div class="sub-message">アピールポイント:{{$store->salespointmessage}}</div> --}}
                        {{-- <div class="sub-message">郵便番号:{{$store->postalcode}}</div> --}}
                        {{-- <div class="sub-message">住所01:{{$store->storeaddress02}}</div>
                        <div class="sub-message">住所02:{{$store->storeaddress03}}</div> --}}

                <!-- 施設サービスのループ -->
                <!-- ここで施設のTOP画像を表示させる。 -->
                @foreach($selectstoreservices as $storeservice)
                <!-- アイコン画像の取得 -->
                @php
                $selectservices = $services
                ->where('serviceid',$storeservice->serviceid);
                @endphp

                @foreach($selectservices as $service)
                <div class="icon-img">
                    <ul>
                        <li>
                            {{-- <p>アイコンURL:{{$service->serviceiconimageurl}}</p> --}}
                            <img  class="icon-img-contents"src={{$service->serviceiconimageurl}}>
                        </li>
                    </ul>
                </div>

                @endforeach

                @endforeach
                    </div>
            </div>
                @endforeach
                @endif

            </div>
     
</body>

</html>