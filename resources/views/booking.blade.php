<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- CSRF対策 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    {{-- ajax制御用 --}}
    {{-- <script type="text/javascript" src="js/add.js"></script>  --}}

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

        .detail {
            width: 30px;
        }


    </style>
</head>

<body>

    @include('parts.header')

    @foreach ($bookings as $booking)
        <!-- 施設名をstoresから取得 -->
        @php
        $bookingstorenames = $stores
        ->where('storeid', $booking->storeid);
        @endphp
        {{-- <a href="{{ url('storedetail/'.$bookingstorename->storeid) }}">{{
        $bookingstorename->storename }} --}}
    <ul>
        <li><img class="checkin" src="{{ asset('img/checkin.png') }}" alt="">{{ $booking->checkinday}}</li>
        <li><img class="checkout" src="{{ asset('img/checkout.png') }}" alt="">{{ $booking->checkoutday}}</li>
    </ul>





    <div class="flex-center position-ref container">
        <div class="contents">
            <!-- ここからコンテンツの表示を行う。 -->
            <div class="title m-b-md">
                <table class="table">
                    <!-- <caption>予約一覧</caption> -->
                    <thead>
                        <tr>
                            <th scope="col"><img class="host" src="{{ asset('img/host.png') }}" alt=""></th>
                            <th scope="col"><img class="checkin" src="{{ asset('img/checkin.png') }}" alt=""></th>
                            <th scope="col"><img class="checkout" src="{{ asset('img/checkout.png') }}" alt=""></th>
                            <th scope="col"><img class="pay" src="{{ asset('img/pay.png') }}" alt=""></th>
                            <th scope="col"><img class="status" src="{{ asset('img/checkout.png') }}" alt="" style="visibility:hidden"></th>
                            <th scope="col"><img class="cancel" src="{{ asset('img/checkout.png') }}" alt="" style="visibility:hidden"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($bookings as $booking)
                            <!-- 施設名をstoresから取得 -->
                            @php
                            $bookingstorenames = $stores
                            ->where('storeid', $booking->storeid);
                            @endphp --}}
                            <tr>
                                @foreach ($bookingstorenames as $bookingstorename)
                                    <td>
                                        <a href="{{ url('storedetail/'.$bookingstorename->storeid) }}.submit()">{{
                                            $bookingstorename->storename }}
                                    </td>
                                    <td>{{ $booking->checkinday}}</td>
                                    <td>{{ $booking->checkoutday }}</td>                                    
                                    <td>{{ $booking->paymentmoney }}</td>
                                    <td>
                                        @if ($booking->bookingstatus == 0)
                                        <p>予約未確定</p>
                                        @elseif ($booking->bookingstatus == 1)
                                        <p>空き状況確認済み</p>
                                        @elseif ($booking->bookingstatus == 2)
                                        <p>支払い待ち</p>
                                        @elseif ($booking->bookingstatus == 3)
                                        <p>予約完了</p>
                                        @elseif ($booking->bookingstatus == 4)
                                        <p>キャンセル申し込み</p>
                                        @elseif ($booking->bookingstatus == 5)
                                        <p>キャンセル承諾</p>
                                        @elseif ($booking->bookingstatus == 6)
                                        <p>キャンセル料未払い</p>
                                        @elseif ($booking->bookingstatus == 7)
                                        <p>キャンセル済み</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Modal btn --}}
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal" 
                                        {{-- 必要なパラメーターを一緒に渡す --}}
                                        data-bookingid={{$booking->id}} 
                                        data-storename={{$bookingstorename->storename}}
                                        data-storeid={{$bookingstorename->storeid}}
                                        data-checkinday={{$booking->checkinday}}
                                        data-checkoutday={{$booking->checkoutday}}
                                        data-createdat={{$booking->created_at}}
                                        data-paymentmoney={{$booking->paymentmoney}}
                                        data-bookingstatus={{$booking->bookingstatus}}>
                                        <img class="detail" src="{{ asset('img/detail.png') }}" alt="">
                                    </button>
                                        
                                        {{-- Modal --}}
                                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" 
                                        aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">

                                                {{-- Modal content --}}
                                                <div class="modal-content">
                                                    {{-- Modal header --}}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">New message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    {{-- 予約の詳細表示 Form --}}
                                                    <form role="form" id="cancelreq_form">
                                                        {{-- Modal body --}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="bookingid" class="col-form-label">予約番号:</label>
                                                                <input class="form-control" id="bookingid" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="storename" class="col-form-label">施設名:</label>
                                                                <input class="form-control" id="storename" readonly>
                                                            </div>        
                                                            <div class="form-group">
                                                                <label for="checkinday" class="col-form-label">チェックイン:</label>
                                                                <input class="form-control" id="checkinday" readonly>
                                                            </div>     
                                                            <div class="form-group">
                                                                <label for="checkoutday" class="col-form-label">チェックアウト:</label>
                                                                <input class="form-control" id="checkoutday" readonly>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label for="paymentmoney" class="col-form-label">料金:</label>
                                                                <input class="form-control" id="paymentmoney" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bookingstatus" class="col-form-label">予約状況:</label>
                                                                <input class="form-control" id="bookingstatus" readonly>
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label for="message-text" class="col-form-label">ホストへのメッセージ:</label>
                                                                <textarea class="form-control" id="message-text"></textarea>
                                                            </div> --}}
                                                            <div>
                                                    
                                                                <p>キャンセルポリシー：</p>
                                                                <p>チェックインの5日前までに解約すれば、宿泊料金は全額返金されます。
                                                                    チェックインまで5日を切ってからの解約やチェックイン後の解約では、
                                                                    正式なキャンセルから24時間の宿泊料金は返金不可ですが、
                                                                    それ以降の未泊分は50%返金されます。<a href="#">キャンセルポリシーの詳細</a></p>
                                                                <input type="checkbox" id="check"/>
                                                                <span id="alert">キャンセルポリシーに同意する。</p>
                                                                <label for="check" id="cancelpolicy"></label>
                                                                
                                                            </div>
                                                            <!-- キャンセルボタン -->
                                                            <div class="well well-sm text-right">
                                                                <button type="button" class="cancelbtn" >キャンセル</button>
                                                            </div>
                                                            <!-- guestid値を送信 -->
                                                            <input type="hidden" id="guestid" value="{{Auth::user()->id}}" />
                                                            <!-- storeid値を送信 -->
                                                            <input type="hidden" id="storeid" />
                                                        </div>
                                                        {{-- Modal body ここまで--}}
                                                    
                                                    </form>
                                                    {{-- 予約の詳細表示 Form ここまで--}}
                                                        
                                                    {{-- Modal footer --}}
                                                    <div class="modal-footer">
                                                    </div>
                                                    {{-- Modal footer ここまで --}}

                                                </div>
                                                {{-- Modal content ここまで --}}
                                            </div>
                                        </div>
                                    </td>
                                      
                                @endforeach           
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- vueからajaxリクエストを利用してデータを取得するためにaxiosを利用 --}}
    {{-- <script>src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}

    {{-- ajaxのスクリプトを読み込むと"jquery": "^3.2",と競合してモーダルが動かなくなる --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    
    <script>
    // モーダルへのデータ受け渡し
    $('#detailModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var storename = button.data('storename') // Extract info from data-* attributes
        var storeid = button.data('storeid')
        var bookingid = button.data('bookingid')
        var checkinday = button.data('checkinday')
        var checkoutday = button.data('checkoutday')
        var paymentmoney = button.data('paymentmoney')
        var bookingstatus = button.data('bookingstatus') // 
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(storename + 'の予約をキャンセルしますか？')
        modal.find('#bookingid').val(bookingid)
        modal.find('#storename').val(storename)
        modal.find('#storeid').val(storeid)
        modal.find('#checkinday').val(checkinday)
        modal.find('#checkoutday').val(checkoutday)
        modal.find('#paymentmoney').val(paymentmoney)
        if(bookingstatus == 0){
            modal.find('#bookingstatus').val("予約未確定")
        }else if (bookingstatus == 1){
            modal.find('#bookingstatus').val("空き状況確認済み")
        }else if (bookingstatus == 2){
            modal.find('#bookingstatus').val("支払い待ち")
        }else if (bookingstatus == 3){
            modal.find('#bookingstatus').val("予約完了")
        }else if (bookingstatus == 4){
            modal.find('#bookingstatus').val("キャンセル申し込み")
        }else if (bookingstatus == 5){
            modal.find('#bookingstatus').val("キャンセル承諾")
        }else if (bookingstatus == 6){
            modal.find('#bookingstatus').val("キャンセル料未払い")
        }else if (bookingstatus == 7){
            modal.find('#bookingstatus').val("キャンセル済み")
        }

        // 予約状況が0-3の場合は、キャンセルリクエスト不可
        $(function() {
            console.log(bookingstatus);
            $('#check').attr('disabled', 'disabled');
            $('.cancelbtn').attr('disabled', 'disabled');
            var alerttext = document.getElementById("alert");
            
            if(bookingstatus > "3"){
                $('#check').attr('disabled', 'disabled');
                alerttext.innerHTML="現在の予約状況からはキャンセルリクエストはできません。";
                $('.cancelbtn').attr('disabled', 'disabled');
            }else{
                $('#check').removeAttr('disabled'); 
                $('.cancelbtn').attr('disabled', 'disabled');
                alerttext.innerHTML="キャンセルポリシーに同意する。";
            }
        });

        //  キャンセルポリシーに同意した場合にキャンセル依頼ボタンが有効になる動作
        $(function(){
            $('.cancelbtn').attr('disabled', 'disabled');
                $('#check').click(function(){
                    if(this.checked){
                    // ボタンを有効化
                    $('.cancelbtn').attr('disabled', false);
                }else{
                    // ボタンを無効化
                    $('.cancelbtn').attr('disabled', true); 
                }
            });
        });
    });
    
    // cancelbtnを押したらcontrollerへデータを送信
    $('.cancelbtn').on('click', function(){

        // データを格納
        var jsondata = {
            // storename:$('#storename').val(),
            storeid:$('#storeid').val(),
            bookingid:$('#bookingid').val(),
            // checkinday:$('#checkinday').val(),
            // checkoutday:$('#checkoutday').val(),
            // paymentmoney:$('#paymentmoney').val(),
            guestid:$('#guestid').val()
            // message:$('#message-text').val()
        };
        console.log(jsondata);

        const url = '/booking/cancelreq'; // 送信先 URL
        fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            mode: "cors", // no-cors, cors, *same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            // credentials: "same-origin", // include, same-origin, *omit
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Content-Type": "application/json; charset=utf-8",
                // "Content-Type": "application/x-www-form-urlencoded",
            },
            // redirect: "follow", // manual, *follow, error
            // referrer: "no-referrer", // no-referrer, *client
            body: JSON.stringify(jsondata), // 本文のデータ型は "Content-Type" ヘッダーと一致する必要があります
        })
        .then(response => {
            console.log(response);
            alert('キャンセルリクエストが送信されました。');
            window.location.reload();
        });
        
        //  {{-- ajaxのスクリプトを読み込むと"jquery": "^3.2",と競合してモーダルが動かなくなる --}}
        // // CSRF対策
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //     }
        // });

        // $.ajax({
        //     url: '/booking/cancelreq', // 送信先 URL
        //     type: "POST", 
        //     data: JSON.stringify(jsondata),
        //     dataType: "json",
        // }).done(function(data,textStatus,jqXHR){
        //     $("#p1").text(jqXHR.status); //例：200
        // 	console.log(data.code); //1
        // 	console.log(data.name); //eigyou
        // 	$("#p2").text(JSON.stringify(data));
        // }).fail(function (jqXHR, textStatus, errorThrown) {
        //     $("#p1").text("err:"+jqXHR.status); //例：404
        // 	$("#p2").text(textStatus); //例：error
        // 	$("#p3").text(errorThrown); //例：NOT FOUND
        // }).always(function(data){
        //     console.log('post:complete');
        // })

    });


    </script>

</body>

</html>