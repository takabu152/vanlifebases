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

    </style>
</head>

<body>

{{-- Facebook Plugin Snipet JavaScript SDK 読み込み場所指定あり--}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v4.0"></script>

@include('parts.header') 

<!-- ページタイトル -->
<header class="jumbotron my-5 py-5">
    <h1 class="display-2">VANLIFE BASES</h1>
</header>

<div class="container py-5">
    <p class="lead">旅先で「軒先を借りる」、旅人に「軒先を貸す」感覚で、食・住・楽のサービスを通じて訪問者と地元民がつながるプラットフォームです。</p>
</div>

<!-- Vanlifeとは -->
<section class="py-5">
    <div class="container">
    <h1>Vanlifeとは</h1>
    <section class="py-5">
    <p class="lead">思い立って、ふらっと出た車旅。</p>
    <p class="lead">何気ない田舎道、立ち寄った喫茶店で珈琲一杯とお手洗いを使わせてもらった。</p>
    <p class="lead">やんわりとした抑揚ともに耳に入ってきた「よう来たね、いらっしゃい」が、あの町の思い出になった。</p>
    </div>
</section>

<!-- イメージ写真の挿入 -->
<!-- Image Section - set the background image for the header in the line below -->
<section class="py-5 bg-image-full" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(78).jpg');">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
</section>

<!-- 主なサービス -->
<section class="features-icons bg-light text-center py-5">
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Bases for Vanlifers</h3>
            <p class="lead mb-0">車での長距離旅行や車中泊などで必要な生活インフラを提供</p>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Welcome Network</h3>
            <p class="lead mb-0">もてなし方は人それぞれ。自慢のお風呂、地場の野菜などの「逸品」、そして町の良さを伝えたいと行動する「まちびと」が主役となるネットワークです。</p>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- スポットの紹介 -->
<section class="py-5">
    <div class="container">
    <h1 class="nav-link" href="">Vanlifeスポット</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    </div>
</section>

<!-- オススメのスポット画像表示 -->
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(78).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(79).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(81).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(82).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(84).jpg" class="img-fluid"
            alt="">
            <a href="">
            <div class="mask rgba-white-light"></div>
            </a>
        </div>
        </div>
    </div>

    <button type="submit" class="btn btn-block btn-lg btn-primary">施設一覧へ</button>
</div>


<!-- ユーザーの声 -->
<section class="py-5">
    <div class="container">
    <h1>Vanlifers</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    </div>
</section>

<!-- ユーザーの声と顔写真 -->
<section class="testimonials text-center bg-light py-5">
    <div class="container">
    <h2 class="mb-5">体験者の声</h2>
    <div class="row">
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
        <img class="img-fluid rounded-circle mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img(30).jpg" alt="50px">
            <h5>Margaret E.さん</h5>
            <p class="font-weight-light mb-0">"This experience was incredible! I am a solo traveler and this experience, and people that were on it were incredible. If we were all to go out we would not have found the food, and drink deals that the locals have."</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img(31).jpg" alt="50px">
            <h5>Fred S.さん</h5>
            <p class="font-weight-light mb-0">「場所は水天宮の近くで､すごく便利です｡近くの銭湯も午後11時30分までやっていてよかったです｡」</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img(30).jpg" alt="50px">
            <h5>Sarah W.さん</h5>
            <p class="font-weight-light mb-0">"If you wish to learn and immerse yourself in the ways of the Samurai, there is no better teacher than Yusuke. He exudes his love and passion, for his culture and history, in the knowledge he shares with you. It is an amazing experience."</p>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- サイト利用方法 -->
<div class="container py-5">
    <h1>3STEPで簡単予約</h1>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center py-5">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
                </div>
                <h3>vanlifebases.comで「旅行」にアクセス</h3>
                <p class="lead mb-0">共有のリビングルームから別荘に至るまで、どんなスペースでも登録料なしで共有しましょう。</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>予約したい施設を見つける</h3>
                <p class="lead mb-0">ご希望のスケジュール、料金、ゲストの要件を選びます。設定の際にはヒントも表示されます。</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>「予約をリクエスト」をクリック</h3>
                <p class="lead mb-0">リスティングが掲載され次第、条件にかなったゲストから連絡を受けとることができます。ゲストの宿泊前にご質問があればメッセージを送信できます。</p>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>

<!-- ユーザー登録 -->
<section class="py-5">
    <div class="container">
    <h1>ユーザー登録へ</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    <button type="submit" class="btn btn-block btn-lg btn-primary">Ready to get started? Sign up now!</button>
</div>
</section>

<!-- ユーザー登録 -->
<section class="call-to-action text-white text-center py-5">
    <div class="overlay"></div>
    <div class="container">

    </div>
</section>

{{-- SNS埋め込み --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            {{-- Instagram埋め込み --}}
            <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/B24Wk8iA6zR/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:300px; min-width:200px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> 
                    <a href="https://www.instagram.com/p/B24Wk8iA6zR/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> 
                        <div style=" display: flex; flex-direction: row; align-items: center;"> 
                        <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> 
                        <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> 
                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> 
                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div>
                            <div style="padding: 19% 0;"></div> 
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                                <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                        <g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div>
                        <div style="padding-top: 8px;"> 
                            <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> この投稿をInstagramで見る</div></div>
                            <div style="padding: 12.5% 0;"></div> 
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> 
                                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> 
                                <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> 
                                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div>
                                <div style="margin-left: 8px;"> 
                                    <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> 
                                <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div>
                                <div style="margin-left: auto;"> 
                                    <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> 
                                <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> 
                                <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div></a> 
                                <p style=" margin:8px 0 0 0; padding:0 4px;"> 
                                    <a href="https://www.instagram.com/p/B24Wk8iA6zR/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">#itoshima #calmbeach #vanlifebases #vanlifefriendly</a></p> 
                                    <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                        <a href="https://www.instagram.com/vanlifebases/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank"> VanlifeBases</a>さん(@vanlifebases)がシェアした投稿 - <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2019-09-26T16:06:30+00:00">2019年 9月月26日午前9時06分PDT</time></p></div></blockquote> 
                                        <script async src="//www.instagram.com/embed.js"></script>
        </div>
        <div class="col-md-6">
            {{-- Facebook 埋め込み --}}
            <div class="fb-page" data-href="https://www.facebook.com/VanlifeBases/" data-tabs="timeline" data-width="max-width:300px;" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/VanlifeBases/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/VanlifeBases/">VanlifeBases</a>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<!-- Q & A -->
<section class="py-5">
    <div class="container">
    <h1>よくあるご質問</h1>
    <p class="lead">どんな支払方法が選べますか？</p>
    <p>ホストに求められる詳しい要件につきましては、安全・セキュリティ・信頼性に関するAirbnbコミュニティの基準、高評価レビューを獲得するためのポイントをまとめたホスピタリティの基準をチェックしてみましょう。</p>
    <p class="lead">保留中の予約リクエストは変更できますか？</p>
    <p>はい。 ホストが承認する前であれば、予約リクエストを撤回し、変更後の内容で新規予約リクエストを送ることができます。</p>
    <p class="lead">予約する方法は？</p>
    </div>
</section>

<!-- イメージ写真の挿入 -->
<!-- Image Section - set the background image for the header in the line below -->
<section class="py-5 bg-image-full" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg');">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
</section>

<!-- 施設募集 -->
<section class="py-5">
    <div class="container">
    <h1>ホスティング</h1>
    <p class="lead">なぜVanlifeBasesでホスト?</p>
    <p>どんなお家やお部屋でも、Airbnbなら簡単かつ安全にシェアして、世界中の旅好きな仲間とつながれます。 予約可能日から料金、ハウスルール、ゲストとの交流頻度まで、すべて自分で決めることができます。</p>
    <p class="lead">困ったときも安心</p>
    <p>万一に備えるUS$1,000,000の財物補償、US$1,000,000の賠償責任保険が全予約に自動付帯。ホストのみなさまと建物・家財の安全をお守りするため全力で取り組んでいます。</p>
    </div>
</section>

<!-- 施設募集について -->
<div class="container">
    <h1>3STEPで簡単ホスティング</h1>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center py-5">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
                </div>
                <h3>無料でお部屋を掲載</h3>
                <p class="lead mb-0">共有のリビングルームから別荘に至るまで、どんなスペースでも登録料なしで共有しましょう。</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>ホスティング方法を設定</h3>
                <p class="lead mb-0">ご希望のスケジュール、料金、ゲストの要件を選びます。設定の際にはヒントも表示されます。</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>はじめてのゲストをもてなそう</h3>
                <p class="lead mb-0">リスティングが掲載され次第、条件にかなったゲストから連絡を受けとることができます。ゲストの宿泊前にご質問があればメッセージを送信できます。</p>
            </div>
            </div>
        </div>
        </div>
    </section>

<!-- ホスティングに関する資料請求 -->
<section class="py-5">
    <div class="container">
    <h1>ホスティングに関する資料請求</h1>
    <p class="lead">Base(Vanlifeスポット)提供者を募集中しています。</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    <button type="submit" class="btn btn-block btn-lg btn-primary">Ready to get started? Sign up now!</button>
</div>
</section>

<!-- ホスティングに関するQ&A -->
<section class="py-5">
    <div class="container">
    <h1>よくあるご質問</h1>
    <p class="lead">Airbnbホストになれるのはどんな人？</p>
    <p>ホストに求められる詳しい要件につきましては、安全・セキュリティ・信頼性に関するAirbnbコミュニティの基準、高評価レビューを獲得するためのポイントをまとめたホスピタリティの基準をチェックしてみましょう。</p>
    <p class="lead">お部屋を掲載するには、いくらかかるの？</p>
    <p>Airbnbへのアカウント登録、お部屋の掲載は完全無料です。予約がとれたら、Airbnbは運営費として宿泊料金からサービス料（通常3％）をいただきます。</p>
    <p class="lead">リスティングの料金はどうやって決めたらいいの？</p>
    <p>料金選びは100%ホストの裁量に任されています。 値付けの目安が欲しい場合には、お住まいの都市やエリアで類似のリスティングを検索すると大体の相場感がつかめます。 </p>
    </div>
</section>


<!-- アライアンス・パートナー -->
<section class="features-icons bg-light text-center py-5">
    <div class="container">
    <h1>アライアンス</h1>
    <div class="row">
        <div class="col-lg-3">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>アライアンス</h3>
            <p class="lead mb-0">保険の窓口</p>
        </div>
        </div>
        <div class="col-lg-3">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>アライアンス</h3>
            <p class="lead mb-0">保険の窓口</p>
        </div>
        </div>
                <div class="col-lg-3">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>アライアンス</h3>
            <p class="lead mb-0">保険の窓口</p>
        </div>
        </div>
        <div class="col-lg-3">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>アライアンス</h3>
            <p class="lead mb-0">保険の窓口</p>
        </div>
        </div>
    </div>
    </div>
</section>


<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
</script>

</body>

</html>