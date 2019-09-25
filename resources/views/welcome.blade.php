<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

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

    {{-- jquery --}}
    <link href="js/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="js/slick.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Styles -->
    <style>

        body {
            color: #808080;
            /* font-family: 'Roboto', sans-serif;
            font-family: 'Noto Sans JP', sans-serif; */
            height: 2000px;
        }
        
        h2 {
            /* text-shadow: 1px 1px 1px gray; */
            font-weight: 500;
            text-align: left;
            color: #808080 ;
        }

        .card-body {
            padding: 0;
            margin-top: 8px;
        }

        .card {
            text-align: center;
            position: relative;
            top: 100px;
            align-items: center;
            display: flex;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
            font-family: 'Noto Sans JP', sans-serif;
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

        .sub-message {
            text-align: left;
        } 

        a {
            color: gray;
        }

        a:hover {
            text-decoration: none;
            color: gray;
        }

        .card {
            border: none;
        }


    </style>
</head>

<body>
  
    {{-- partsフォルダのheaderを読み込む --}}
    @include('parts.header')

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
    
    @foreach($selectstoreimages as $storeimage)

        <div class="card col-md-4 slider">

            <form action="{{ url('storedetail/'.$store->storeid) }}" method="GET">
                <a target="_blank" href="{{ url('storedetail/'.$store->storeid) }}.submit()">
                <img class="card-img-top" src="{{ $storeimage->imageurl
                }}" alt="カードの画像">
                <div class="card-body">
                    <h2>{{ $store->storename }}【{{$store->storeaddress01}}】</h2>
                    <h3 class="sub-message">{{$store->forusermessage}}</h3>
                    <p class="sub-message"><a>{{$store->websiteurl}}</a></p>
                </div>
        </div>
            @endforeach
            
            <!-- 施設サービスのループ -->
            @foreach($selectstoreservices as $storeservice)

            <!-- アイコン画像の取得 -->
            @php
            $selectservices = $services
            ->where('serviceid',$storeservice->serviceid);
            @endphp

            {{-- @foreach($selectservices as $service)
            <div class="icon-img">
                <ul>
                    <li>
                        <img  class="icon-img-contents" src="{{$service->serviceiconimageurl}}">
                    </li>
                </ul>
            </div>
            @endforeach --}}
            @endforeach
        </a>
        </form>
    

    @endforeach
    @endif
    

    {{-- <script>
    $('.slider').slick({
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
    slidesToShow:4,
    responsive:[
        {
            breakpoint: 1024,
            settings:{
                slidesToShow:3,
            }
        },
        {
            breakpoint: 768,
            settings:{
                slidesToShow:2,
            }
        },
        {
            breakpoint: 480,
            settings:{
                slidesToShow:1,
            }
        },
    ]
});
    </script> --}}

</body>

</html>