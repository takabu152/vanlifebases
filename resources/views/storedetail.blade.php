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
            color: #636b6f;
            /* font-family: 'Raleway', sans-serif; */
            font-weight: 100;
            /* color: white; */
            /* height: 100vh; */
            margin: 0 auto;
        }

        .flex-center {
            align-items: center;
            justify-content: center;
        }

        .container {
            display: table;
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
            display: flex;
            z-index: 100;
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

        .main-img {
            vertical-align:bottom;
            width: 100%;
            height: 800px;
            object-fit: cover;
        }

        .message {
            text-align: left;
            padding-top: 32px;
            display: table-cell;
            color: black;
        }

        .contents {
            display: flex;
            
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

    <div class="container flex-center position-ref full-height">

        <div class="contents ">
            <div class="main-message">
                <h1>{{ $store->storename }}【{{$store->storeaddress01}}】</h1>
                <h2>県名:{{$store->storeaddress01}}</h2>
                <h3>郵便番号:{{$store->postalcode}}</h3>
                <h3>住所01:{{$store->storeaddress02}}</h3>
            {{-- <div>住所02:{{$store->storeaddress03}}</div> --}}
            </div>

            <div class="sub-message">
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


            {{-- 施設写真の取得(トップ画像のみ取得)
            @php
            $selecttopstoreimages = $storeimages
            ->where('storeid',$store->storeid)´
            ->where('imagedivision',1);
            @endphp --}}

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

            <!-- 施設メイン情報の表示 -->
            <h2>ユーザーへの一言:{{$store->forusermessage}}</h2>
            <div>アピールポイント:{{$store->salespointmessage}}</div>
            {{-- <div>websiteURL:{{$store->websiteurl}}</div> --}}

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
            <img src={{$freeservice->serviceiconimageurl}}>
            <div>サービス名:{{$freestoreservice->unitpricename}}</div>
            @endforeach

            @endforeach
            </div>

        </div>

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
            {{-- <img src={{$paidservice->serviceiconimageurl}}> --}}
            <div>サービス名:{{$paidstoreservice->unitpricename}}</div>
            <div>料金:{{$paidstoreservice->unitprice}}円</div>
            @endforeach
            @endforeach

            <!-- 施設イメージのループ -->
            <!-- ここで施設のサブ画像を表示させる。 -->
            @foreach($selectsubstoreimages as $substoreimage)
            <div>画像URL:{{ $substoreimage->imageurl }}</div>
            {{-- <img src={{ $substoreimage->imageurl }}> --}}
            @endforeach

            @if (Route::has('login'))
             {{-- @include('parts.reservation') --}}
             @auth
                <div class="row">
                    <div class="col-md-12">
                        @include('common.errors')

                            <form action="{{ url('/storedetail')}}" method="POST">
                                {{ csrf_field() }}

                                <!-- storename -->
                                <div class="form-group col-5">
                                    <label for="storename">施設名</label>
                                    <input type="text" id="storename" name="storename" class="form-control" value="{{$store->storename}}">
                                </div>
                                <!-- checkinday -->
                                <div class="form-group col-5">
                                    <label for="checkinday">チェックイン</label>
                                    <input type="date" id="checkinday" name="checkinday" class="form-control" value="$book->checkinday">
                                </div>
                                <!-- checkoutday -->
                                <div class="form-group col-5">
                                    <label for="checkoutday">チェックアウト</label>
                                    <input type="date" id="checkoutday" name="checkoutday" class="form-control" value="$book->checkoutday">
                                </div>
                                <!-- paymentmoney -->
                                <div class="form-group col-5">
                                    <label for="paymentmoney">料金</label>
                                    <input type="number" id="paymentmoney" name="paymentmoney" class="form-control" value="$book->paymentmoney">
                                </div>
                                <!-- Reserveボタン -->
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-primary">予約</button>
                                    {{-- <a class="btn btn-link pull-right" href="{{ url('/') }}">Back</a> --}}
                                </div>
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

                        <a class="btn btn-link pull-right" href="{{ url('/welcome') }}">施設一覧へ戻る</a>
                    </div>
                </div>
                
            @else
            {{-- partsフォルダのlogin.blade.php読込み --}}
            @include('parts.login')
            @endauth
            @endif
        </div>
    </div>

@include('parts.footer')

</body>

</html>