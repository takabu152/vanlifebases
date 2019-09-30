<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VanLifebases</title>

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
        html {
            font-size: 62.5%;
        }

        body {
            background-color: #fff;
            color: #808080;
            font-size: 3.0rem;
            font-weight: 100;
            margin: 0 auto;
        }

        .nav-link {
            margin-right: 18px;
        }

        h1 {
            border-bottom: solid 1px;
            font-size: 3vmin;
            font-weight: bold;
            margin-bottom: 96px;
            width: 90%;
        }

        h2 {
            font-size: 2.8rem;
            margin-bottom: 96px;
        }

        h3 {
            font-size: 2.4rem;
            margin-bottom: 24px;
        }

        .main-img,.sub-img {
            vertical-align:bottom;
            width: 100%;
            height: 700px;
            object-fit: cover;
            margin-bottom: 80px;
        }

        .sub-img {
            object-fit: contain;
            margin-bottom: 8px;
            height: 250px;
        }

        .contents {
            display: table;
            position: relative;
        }

        .services {
            display: flex;
            margin-bottom: 48px; 
        }

        .free-services {
            margin-bottom: 48px; 
        }

        li {
            list-style-type: none;
        }

        .icon {
            width: 60%;
        }

        .post {
            margin-bottom: 16px;
        }

        button {
            margin: 16px 0 16px 0;
        }

        .split-box {
            display: table-cell;
            width:40%;
        }
        
        .left-box {
            left:0;
            overflow-y:scroll;
        }
        
        .card {
            margin-top: 56px;
            position: -webkit-sticky;
            position: sticky;
            height: 100%;
            top: 120px;
        }

        .form-control,.btn-primary {
            font-size: 2.0rem;
        }

        .back {
            font-size: 3.0rem;
            color: #808080;
        }

        .back:hover {
            color: #808080;
            text-decoration: none;
        }

        iframe {
            margin-bottom: 32px;
        }

    </style>
</head>

<body>
        
    @include('parts.header')

    @php
        $selecttopstoreimages = $storeimages
        ->where('storeid',$store->storeid)
        ->where('imagedivision',1);
    @endphp

    <!-- 施設イメージのループ -->
    <!-- ここで施設のtop画像を表示させる。 -->
    @foreach($selecttopstoreimages as $topstoreimage)
    {{-- <div>画像URL:{{ $topstoreimage->imageurl }}</div> --}}
    <div class="main-img-box">
        <img class="main-img" src={{ $topstoreimage->imageurl }}>
    </div>
    @endforeach

        <section class="contents container flex-center position-ref full-height">

            <div class="split-box　main-message ">

                <h1>{{ $store->storename }}【{{$store->storeaddress01}}】</h1>
                <h2>{{$store->forusermessage}}</h2>
                <h2>{{$store->salespointmessage}}</h2>
                <!-- 施設メイン情報の表示 -->
                
                
                {{-- <div>websiteURL:{{$store->websiteurl}}</div> --}}            
                    <div class="sub-message">
                    <!-- ここからコンテンツの表示を行う。 -->

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

                        <!-- 施設写真の取得(サブ画像のみ取得) -->
                        @php
                        $selectsubstoreimages = $storeimages
                        ->where('storeid',$store->storeid)
                        ->where('imagedivision',2);
                        @endphp

                        <!-- 施設イメージのループ -->
                        <!-- ここで施設のサブ画像を表示させる。 -->
                        {{-- @foreach($selecttopstoreimages as $topstoreimage)
                        <div>画像URL:{{ $topstoreimage->imageurl }}</div>
                        <img src={{ $topstoreimage->imageurl }}>
                        @endforeach --}}

                        <!-- 無料施設サービスのループ -->
                        
                        <h3>無料施設サービス一覧</h3>
                        <div class="services">
                        @foreach($selectfreestoreservices as $freestoreservice)
                        <!-- アイコン画像の取得 -->
                        @php
                        $selectfreeservices = $services
                        ->where('serviceid',$freestoreservice->serviceid);
                        @endphp

                        @foreach($selectfreeservices as $freeservice)
                            <ul> 
                                {{-- <div>アイコンURL:{{$freeservice->serviceiconimageurl}}</div> --}}
                                <li><img class="icon" src={{$freeservice->serviceiconimageurl}}></li>
                                {{-- <div>サービス名:{{$freestoreservice->unitpricename}}</div> --}}
                            </ul>
                        @endforeach
                        @endforeach
                        </div>
                        
                        <!-- 有料施設サービスのループ -->
                        
                        <h3>有料施設サービス一覧</h3>

                        <div class="free-services">
                        @foreach($selectpaidstoreservices as $paidstoreservice)
                        <!-- アイコン画像の取得 -->
                        @php
                        $selectpaidservices = $services
                        ->where('serviceid',$paidstoreservice->serviceid);
                        @endphp

                        @foreach($selectpaidservices as $paidservice)
                        {{-- <div>アイコンURL:{{$paidservice->serviceiconimageurl}}</div> --}}
                        {{-- <img src={{$paidservice->serviceiconimageurl}}> --}}
                        <div>サービス名:{{$paidstoreservice->unitpricename}}</div>
                        <div>料金:{{$paidstoreservice->unitprice}}円</div>
                        @endforeach
                        @endforeach
                        </div>

                        <h3 class="post">〒{{$store->postalcode}}&nbsp;{{$store->storeaddress02}}</h3>

                        {{-- Googlemapswp差し込みたいですがDBいじってないので具体例として --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.105904470004!2d130.39798231551552!3d33.57659945009173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541919d51550001%3A0x6eea2b4cdf483e49!2sNO%20COFFEE!5e0!3m2!1sja!2sjp!4v1569686590593!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        
                        {{-- <div>住所02:{{$store->storeaddress03}}</div> --}}

                        @foreach($selectsubstoreimages as $substoreimage)
                        {{-- <div>画像URL:{{ $topstoreimage->imageurl }}</div> --}}
                        <div class="sub-img-box">
                            <img class="sub-img" src={{ $substoreimage->imageurl }}>
                        </div>
                        @endforeach

                        
                        <a class="back btn btn-link pull-right" href="{{ url('/') }}"><strong>＜</strong>&nbsp;施設一覧へ戻る</a>
                    </div>
                    </div>

                            {{-- ユーザーログインしている場合のみ、予約画面が表示される。 --}}
                            @if (Route::has('login'))
                            {{-- @include('parts.reservation') --}}
                            @auth
                                <div class="row split-box">

                                    @include('common.errors')

                                    <form class="card form-group col-10" action="{{ url('/storedetail')}}" method="POST">
                                        {{ csrf_field() }}

                                        <!-- storename -->
                                            <label for="storename">施設名</label>
                                            <input type="text" id="storename" name="storename" class="form-control" value="{{$store->storename}}">

                                        <!-- checkinday -->
                                            <label for="checkinday">チェックイン</label>
                                            <input type="date" id="checkinday" name="checkinday" class="form-control" >
                                            {{-- <input type="date" id="checkinday" name="checkinday" class="form-control" value="{{$book->checkinday}}"> --}}

                                        <!-- checkoutday -->
                                            <label for="checkoutday">チェックアウト</label>
                                            <input type="date" id="checkoutday" name="checkoutday" class="form-control" >
                                            {{-- <input type="date" id="checkoutday" name="checkoutday" class="form-control" value="{{$book->checkoutday}}"> --}}

                                        <!-- paymentmoney -->
                                            <label for="paymentmoney">料金</label>
                                            <input type="number" id="paymentmoney" name="paymentmoney" class="form-control" >
                                            {{-- <input type="number" id="paymentmoney" name="paymentmoney" class="form-control" value="{{$book->paymentmoney}}"> --}}

                                        <!-- Reserveボタン -->
                                            <button type="submit" class="btn btn-primary col-4">予約</button>
                                            {{-- <a class="btn btn-link pull-right" href="{{ url('/') }}">Back</a> --}}

                                        <!-- guestid値を送信 -->
                                        @php
                                        $user=Auth::user();
                                        @endphp
                                        <input type="hidden" name="guestid" value="{{$user->id}}">
                                        <!-- storeid値を送信 -->
                                        <input type="hidden" name="storeid" value="{{$store->storeid}}">
                                        <!-- storeemail1値を送信 -->
                                        <input type="hidden" name="storeemail1" value="{{$store->emai1}}">
                                        <!-- storeemail2を送信 -->
                                        <input type="hidden" name="storeemail2" value="{{$store->email2}}">
                                    </form>

                            @endauth
                            @guest
                                @include('parts.login')
                            @endguest
                            @endif

                            

                    </div>
        </section>

@include('parts.footer')

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script>

    </script>
</body>

</html>