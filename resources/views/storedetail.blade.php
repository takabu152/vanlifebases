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
        html,
        body {
            background-color: #fff;
            color: #808080;
            font-weight: 100;
            margin: 0 auto;
        }

        .main-img {
            vertical-align:bottom;
            width: 100%;
            height: 700px;
            object-fit: cover;
            margin-bottom: 80px;
        }

        .contents {
            display: flex;
        }

        ul {
            float: left;
        } 

        li {
            float: left;
            list-style-type: none;
        }

        h1 {
            border-bottom: solid 1px;
        }

        .sub-img {
            width: 10%;
        }

        button {
            margin: 16px 0 16px 0;
        }

        .split-box {
            position:absolute;
            width:50%;
            height:100%;
        }
        
        .left-box {
            left:0;
        }
        
        .right-box {
            right:0;
            overflow-y:scroll;
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
    <!-- ここで施設のサブ画像を表示させる。 -->
    @foreach($selecttopstoreimages as $topstoreimage)
    {{-- <div>画像URL:{{ $topstoreimage->imageurl }}</div> --}}
    <div class="main-img-box">
        <img class="main-img" src={{ $topstoreimage->imageurl }}>
    </div>
    @endforeach

        <section class="contents container flex-center position-ref full-height">

            <div class="split-box　main-message row-6">

                <h1>{{ $store->storename }}【{{$store->storeaddress01}}】</h1>
                <h3>郵便番号:{{$store->postalcode}}</h3>
                <h3>住所01:{{$store->storeaddress02}}</h3>
                {{-- <div>住所02:{{$store->storeaddress03}}</div> --}}
                <!-- 施設メイン情報の表示 -->
                <h2>ユーザーへの一言:{{$store->forusermessage}}</h2>
                <div>アピールポイント:{{$store->salespointmessage}}</div>
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
                        <div>無料施設サービス一覧</div>
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

                            <!-- 有料施設サービスのループ -->
                            <div>有料施設サービス一覧</div>
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
                    </div>

                            {{-- ユーザーログインしている場合のみ、予約画面が表示される。 --}}
                            @if (Route::has('login'))
                            {{-- @include('parts.reservation') --}}
                            @auth
                                <div class="row split-box">
                                    <div class="col-md-12 ">

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
                                </div>

                            @endauth
                            @guest
                                @include('parts.login')
                            @endguest
                            @endif

                            <a class="btn btn-link pull-right" href="{{ url('/welcome') }}">施設一覧へ戻る</a>

                    </div>
            
        </section>

@include('parts.footer')

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script>
    $(function() {
        var area2PosTop = $('#area2').offset().top;
        var area3PosTop = $('#area3').offset().top;
        var ashPosTop = $('#ashColorArea').offset().top;
        
        $(window).scroll(function() {
            var value = $(this).scrollTop();  //スクロール値を取得
            $('#scrollValue').text(value);
        
            // Area1
            $('#area1').css('background-position-y', value);
        
            // Area2
            if (value > area2PosTop) {
            $('#area2').css('background-position-y', value - area2PosTop);
            console.log('area2 variable');
            } else {
            $('#area2').css('background-position-y', 'top');
            console.log('area2 top');
            }
    </script>
</body>

</html>