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
            font-size: 2.0rem;
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
            object-fit: fill|contain|cover|none|scale-down;
            margin: 0;
            height: 250px;
            border-radius: 5px;
            filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.4));
        }

        .sub-img-box {
            margin-right: 36px;
            margin-bottom: 56px;
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

        @media(max-width:670px) {
            html {
                width: 100%;
            }

            .contents {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .main-message {
                width:
            }

            .split-box {
                width: 100%;
            }
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

            <div class="split-box main-message ">

                {{-- <h1>{{ $store->storename }}<br>[{{$store->storeaddress01}}]</h1>
                <h2>{{$store->forusermessage}}</h2>
                <h2>{{$store->salespointmessage}}</h2> --}}
                <!-- 施設メイン情報の表示 -->
                <h1>{{ $store->storename }}【{{ $store->storeaddress01 }}】</h1>
                <h2>{{ $store->forusermessage }}</h2>
                <h2>{{ $store->salespointmessage }}</h2>
                
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

                        @php
                        
                         
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

                        <!-- 無料サービスのループ -->
                        <h3>無料サービス一覧</h3>
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
                        
                        <!-- 有料サービスのループ -->
                        <h3>有料サービス一覧</h3>

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
                        
                        
                        {{-- <div>住所02:{{$store->storeaddress03}}</div> --}}
                        <h4>その他イメージ</h4>
                        @foreach($selectsubstoreimages as $substoreimage)
                        {{-- <div>画像URL:{{ $topstoreimage->imageurl }}</div> --}}
                        <div class="sub-img-box">
                            <img class="sub-img" src={{ $substoreimage->imageurl }}>
                        </div>
                        @endforeach

                        <h3 class="post">〒{{$store->postalcode}}&nbsp;{{$store->storeaddress02}}</h3>
                        {{-- Googlemapswp差し込みたいですがDBいじってないので具体例として --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.105904470004!2d130.39798231551552!3d33.57659945009173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541919d51550001%3A0x6eea2b4cdf483e49!2sNO%20COFFEE!5e0!3m2!1sja!2sjp!4v1569686590593!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

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
                                    <input type="text" id="storename" name="storename" class="form-control" value="{{$store->storename}}" readonly>
                                <!-- checkinday -->
                                    <label for="checkinday">チェックイン</label>
                                    <input type="date" id="checkinday" name="checkinday" class="form-control" >
                                <!-- checkoutday -->
                                    <label for="checkoutday">チェックアウト</label>
                                    <input type="date" id="checkoutday" name="checkoutday" class="form-control" >
                                <!-- charge per night -->
                                    <label for="charge">料金/１泊１台</label>
                                    <input type="number" id="charge" name="charge" class="form-control" value="{{$store->price}}" readonly>
                                <!-- days -->
                                    <span id="days"></span>
                                <!-- paymentmoney -->
                                    <label for="paymentmoney">料金</label>
                                    <input type="number" id="paymentmoney" name="paymentmoney" class="form-control" value="" readonly >
                                <!-- Reserveボタン -->
                                    {{-- <button type="button" class="reserve_btn" id="reserve_btn">予約</button> --}}
                                    <div class="py-2">
                                    <input type="submit" class="btn btn-lg btn-outline-secondary btn-block rounded-0" id="reserve_btn" value="送信">
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
                    
                    @endauth
                    @guest
                    {{-- ログインしていない場合は、ログインを促す。 --}}
                    <div class="container">
                        <p>予約にはログインが必要です。ユーザーアカウントをお持ちでない方は、まず登録をお願いします。</p>
                        {{-- ユーザー登録・ログインページへのリンクボタン --}}
                        <a href="{{ url('/login') }}" class="btn btn-outline-secondary btn-block rounded-0" role="button" >新規登録・ログイン</a>
                    </div>

                    @endguest
                    @endif

                            

                    </div>
        </section>
        <div class="container">
            <a class="back btn btn-link pull-right" href="{{ url('/') }}"><strong>＜</strong>&nbsp;施設一覧へ戻る</a>
        </div>
@include('parts.footer')

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>

    // パララックスTsuru
    // $(function() {
    //     var area2PosTop = $('#area2').offset().top;
    //     var area3PosTop = $('#area3').offset().top;
    //     var ashPosTop = $('#ashColorArea').offset().top;
        
    //     $(window).scroll(function() {
    //         var value = $(this).scrollTop();  //スクロール値を取得
    //         $('#scrollValue').text(value);
        
    //         // Area1
    //         $('#area1').css('background-position-y', value);
        
    //         // Area2
    //         if (value > area2PosTop) {
    //         $('#area2').css('background-position-y', value - area2PosTop);
    //         console.log('area2 variable');
    //         } else {
    //         $('#area2').css('background-position-y', 'top');
    //         console.log('area2 top');
    //         };
    //     });
    // });

    // 予約日数の計算
    
    $(function(){
        var charge = $('#charge').val(); // 駐車場の１泊あたりの利用料金を取得
        var paymentmoney = $('#paymentmoney');

        $(function(){
            $('#checkinday').change(function(event){
                setDate();
            });
            $('#checkoutday').change(function(event){
                setDate();
            });
            function setDate(){
                var fromDate = new Date($('#checkinday').val());
                var toDate = new Date($('#checkoutday').val());
                
                if(!toDate.getDate() || fromDate.getDate()>toDate.getDate()){
                    var year = fromDate.getFullYear().toString;
                    var mm = (fromDate.getMonth()+1).toString;
                    var dd = fromDate.getDate().toString;
                    var yyyymmdd = year + '-' + (mm[1]?mm:"0"+mm[0]) + '-' + (dd[1]?dd:"0"+dd[0]);
                    $('#checkoutday').val(yyyymmdd);
                }
                var days = Math.floor((toDate.getTime() - fromDate.getTime()) / 86400000);

                if (days>=1){
                    $('#days').html(' （計'+days+'泊）');
                    $("#paymentmoney").val(days * charge); // 宿泊日数X泊の利用料金をフォームに出力
                }else{
                    $('#days').html('');
                }
            }
        });
    });

    // 予約フォームの未入力防止措置Yanagimoto
    $(function(){
        if ($("#paymentmoney").val().length == 0) {
            $("#submit1").prop("disabled", true);
        }
        $("#paymentmoney").on("keydown keyup keypress change", function() {
            if ($(this).val().length < 2) {
                $("#paymentmoney").prop("disabled", true);
            } else {
                $("#paymentmoney").prop("disabled", false);
            }
        });
    });

    </script>
</body>

</html>