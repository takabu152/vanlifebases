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

        .jumbotron-extend-top {
            position: relative;
            height: 100vh;
            min-height: 200px;
            background: url('/img/landscape/sampleimg16.jpg') no-repeat center;
            background-size: cover;
            background-attachment:fixed;
            filter: grayscale(100%);
            object-position: 100% 100%;
        }

        .jumbotron-container{
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
        }

        .coverimage{
            width: 100%;
            height: 300px;
            object-fit: cover;
            filter: grayscale(100%);
        }

        .img-fluid{
            filter: grayscale(100%);
        }

        .card-img-top{
            filter: grayscale(100%);
        }
    
    </style>
</head>

<body>

{{-- Facebook Plugin Snipet JavaScript SDK 読み込み場所指定あり --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v4.0"></script>

@include('parts.header') 

<div class="jumbotron jumbotron-extend-top">
    <div class="container-fluid jumbotron-container">
        <h2 class="leadtext">明日は、どのまちで、誰と会おうか？</h2>     
    </div>
</div>

<!-- ページタイトル -->
<div class="container py-5">
    <p class="lead">旅先で「軒先を借りる」、旅人に「軒先を貸す」感覚で、食・住・楽のサービスを通じて訪問者と地元民がつながるプラットフォームです。</p>
</div>

<!-- イメージ写真の挿入 -->
<div class="view overlay z-depth-1-half">
    <img src="{{ asset('img/landscape/sampleimg22.jpg') }}" class="img-fluid coverimage" alt="">
        <a href="">
            <div class="mask rgba-white-light"></div>
        </a>
</div>

<!-- Vanlifeとは -->
<div class="container py-5">
    <h2 class="leadtext">Vanlife(車泊)の魅力</h2>

<div class="container py-5">
  <div class="row">
    <div class="col-md-6 col-sm-12 pm-2 flex-column justify-content-center">
        <p class="lead">つながる新しい旅のカタチ</p>
        <p>家を貸す人はホスト、借りる人はゲストと呼ばれ、ホストが心を尽くして用意してくれる家に泊まれば、きっとわが家のようにくつろげるはず。</p>
    </div>
    <div class="col-md-6 col-sm-12">
        <img class="img-fluid" src="{{ asset('img/landscape/sampleimg17.jpg') }}" alt="...">
    </div>
    <div class="col-md-6 col-sm-12">
    <img class="img-fluid" src="{{ asset('img/landscape/sampleimg19.jpg') }}" alt="...">
    </div>
    <div class="col-md-6 col-sm-12 flex-column justify-content-center">
        <p class="lead">その土地の暮らしを味わえる旅</p>
        <p>地元のめずらしい食材に挑戦してみたり、お店で近所の人たちと仲良くなったり、ガイドブックには載っていない名所を発見したり。滞在中、まるでその土地の人になったように、現地の風土や文化を体験できます。</p>
    </div>
    <div class="col-md-6 col-sm-12 flex-column justify-content-center">
        <p class="lead">あなたにぴったりの旅の選択肢</p>
        <p>オーシャンビューから森の中まで、旅の予算、目的、そして好みに合った場所があなたのホームになります。</p>
    </div>
    <div class="col-md-6 col-sm-12">
        <img class="img-fluid" src="{{ asset('img/landscape/sampleimg23.jpg') }}" alt="...">
    </div>
  </div>
</div>

</div>

<!-- サービス -->
<div class="container">
<div class="row">
      <div class="col-md-6 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('img/landscape/sampleimg21.jpg') }}" alt="">
          <div class="card-body">
            <h4 class="card-title">Bases for Vanlifers</h4>
            <p class="card-text">VanlifeBases(バンライフベイシズ)は、車で泊まる場所を探す人と、駐車スペース・生活サービスを提供したい人をつなぐオンラインサービスです。</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('img/landscape/sampleimg25.jpg') }}" alt="">
          <div class="card-body">
            <h4 class="card-title">Welcome Network</h4>
            <p class="card-text">もてなし方は人それぞれ。自慢のお風呂、地場の野菜などの「逸品」、そして町の良さを伝えたいと行動する「まちびと」が主役となるネットワークです。</p>
          </div>

        </div>
      </div>
    </div>
</div>

<!-- スポットの紹介 -->
<section class="py-5">
    <div class="container">
    <h2 class="nav-link" >BASES for Vanlifers<span class="sr-only">(現位置)</span></h2>
    {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, 
        rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo 
        voluptatem quae delectus odit vel itaque amet.</p> --}}
    </div>
</section>

<!-- オススメのスポット画像表示 -->
<div class="container">
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        <li data-target="#carousel-example-1z" data-slide-to="3"></li> 
        <li data-target="#carousel-example-1z" data-slide-to="4"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('img/landscape/sampleimg04.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/landscape/sampleimg05.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/landscape/sampleimg06.jpg') }}" alt="Third slide">
        </div>    
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/landscape/sampleimg09.jpg') }}" alt="Forth slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/landscape/sampleimg10.jpg') }}" alt="Fifth slide">
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
    {{-- 施設一覧ページへのリンクボタン --}}
    <a href="{{ url('/storeslist') }}" class="btn btn-outline-secondary btn-block rounded-0" role="button" >施設一覧へ</a>
</div>

<!-- ユーザーの声 -->
<section class="py-5">
    <div class="container">
    <h2>Vanlifers</h2>
    <p class="lead">体験者の声</p>
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p> --}}
    </div>
</section>

<!-- ユーザーの声と顔写真 -->
<section class="testimonials text-center bg-light py-5">
    <div class="container">
    <h2 class="mb-5"></h2>
    <div class="row">
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
        <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/landscape/users01.jpg') }}" alt="...">
            <h5>Margaret E.さん</h5>
            <p class="font-weight-light mb-0">"This experience was incredible! I am a solo traveler and this experience, and people that were on it were incredible. If we were all to go out we would not have found the food, and drink deals that the locals have."</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/landscape/users02.jpg') }}" alt="...">
            <h5>Fred S.さん</h5>
            <p class="font-weight-light mb-0">「場所は水天宮の近くで､すごく便利です｡近くの銭湯も午後11時30分までやっていてよかったです｡」</p>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/landscape/users03.jpg') }}" alt="...">
            <h5>Sarah W.さん</h5>
            <p class="font-weight-light mb-0">"If you wish to learn and immerse yourself in the ways of the Samurai, there is no better teacher than Yusuke. He exudes his love and passion, for his culture and history, in the knowledge he shares with you. It is an amazing experience."</p>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- サイト利用方法 -->
<div class="container py-5">
    <h2>予約はシンプルに "3 STEPs"</h2>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center py-5">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
                </div>
                <h3>STEP 1</h3>
                <p class="lead mb-0">vanlifebases.comから、施設一覧ページにアクセス</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>STEP 2</h3>
                <p class="lead mb-0">リストから、予約したい施設を見つける！</p>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                </div>
                <h3>STEP 3</h3>
                <p class="lead mb-0">予約したい日程を指定し、「予約をリクエスト」をクリック！</p>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>

<!-- イメージ写真の挿入 -->
<div class="view overlay z-depth-1-half">
    <img src="{{ asset('img/landscape/sampleimg15.jpg') }}" class="img-fluid coverimage" alt="">
        <a href="">
            <div class="mask rgba-white-light"></div>
        </a>
</div>

<!-- ユーザー登録 -->
<section class="py-5">
    <div class="container">
        <h2>ユーザー登録へ</h2>
        {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p> --}}
        {{-- ユーザー登録ページへのリンクボタン --}}
        <a href="{{ url('/login') }}" class="btn btn-outline-secondary btn-block rounded-0" role="button" >新規登録・ログイン</a>
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
    <h2>よくあるご質問</h2>

    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
            <a class="text-body" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
            どんな支払方法が選べますか？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            ホストに求められる詳しい要件につきましては、安全・セキュリティ・信頼性に関するAirbnbコミュニティの基準、高評価レビューを獲得するためのポイントをまとめたホスピタリティの基準をチェックしてみましょう。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
            <a class="collapsed text-body" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
            保留中の予約リクエストは変更できますか？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            はい。 ホストが承認する前であれば、予約リクエストを撤回し、変更後の内容で新規予約リクエストを送ることができます。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    <div class="card">
        <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
            <a class="collapsed text-body" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
            キャンセルしても100%返金してもらえますか？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            ゲスト都合による予約キャンセルの場合、返金額は各ホストのキャンセルポリシーの種別と、何日前の解約かによって決まります。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    </div><!-- /#accordion -->
    </div>
</section>



<!-- イメージ写真の挿入 -->
<!-- Image Section - set the background image for the header in the line below -->
<div class="view overlay z-depth-1-half">
    <img src="{{ asset('img/landscape/sampleimg14.jpg') }}" class="img-fluid coverimage" alt="">
        <a href="">
            <div class="mask rgba-white-light"></div>
        </a>
</div>

<!-- 施設募集 -->
<section class="py-5">
    <div class="container">
    <h2>ホスティング</h2>
    <p class="lead">なぜVanlifeBasesでホスト?</p>
    <p>簡単かつ安全にシェアして、世界中の旅好きな仲間とつながれます。 予約可能日から料金、ハウスルール、ゲストとの交流頻度まで、すべて自分で決めることができます。</p>
    <p class="lead">困ったときも安心</p>
    <p>万一に備えるUS$1,000,000の財物補償、US$1,000,000の賠償責任保険が全予約に自動付帯。ホストのみなさまと建物・家財の安全をお守りするため全力で取り組んでいます。</p>
    </div>
</section>

<!-- 施設募集について -->
<div class="container">
    <h2>3 STEPで簡単ホスティング</h2>
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
<div class="container py-5">
    <h2>まずは資料請求</h2>
    <p class="lead">Base(Vanlifeスポット)提供者として、Vanliferをもてなして見ませんか？</p>
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p> --}}

    {{-- ユーザーログインしている場合 --}}
    @if (Route::has('login'))
    @auth
        <!-- ホスティングに関する資料請求のフォーム -->
        <p>
            <button type="button" class="btn btn-outline-secondary btn-block rounded-0" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                ホスティングに関する資料請求
            </button>
        </p>
        <!-- ホスティングに関する資料請求のメールフォーム -->
        <div class="collapse" id="collapseExample">
            <div class="card card-body border border-0">
                <form action="{{ url('/affiliate') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-form-label">お名前:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>      
                    <div class="form-group">
                        <label for="email" class="col-form-label">Emailアドレス:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>     
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">メッセージ:</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-secondary btn-block rounded-0" value="送信">
                </form>
            </div>
        </div>
    @endauth
    @guest
        {{-- ユーザーログインしていない場合 --}}
        <p>
            <button type="button" class="btn btn-outline-secondary btn-block rounded-0" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                ホスティングに関する資料請求
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="container">
                    <p class="lead">ユーザー登録はお済みですか？</p>
                    <p>ユーザーログイン後、トップページから資料請求ができます。まずはユーザー登録をお願いします。</p>
                    {{-- ユーザー登録ページへのリンクボタン --}}
                    <a href="{{ url('/login') }}" class="btn btn-outline-secondary btn-block rounded-0" role="button" >新規登録・ログイン</a>
                </div>
            </div>
        </div>

    @endguest
    @endif
</div>

<!-- ホスティングに関するQ&A -->
<section class="py-5">
    <div class="container">
    <h2>よくあるご質問</h2>
    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
            <a class="text-body" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
            ホストになれるのはどんな人？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            ホストに求められる詳しい要件につきましては、安全・セキュリティ・信頼性に関する基準、高評価レビューを獲得するためのポイントをまとめたホスピタリティの基準をチェックしてみましょう。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
            <a class="collapsed text-body" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
            お部屋を掲載するには、いくらかかるの？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            アカウント登録、お部屋の掲載は完全無料です。予約がとれたら、運営費として宿泊料金からサービス料（通常3％）をいただきます。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    <div class="card">
        <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
            <a class="collapsed text-body" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
            リスティングの料金はどうやって決めたらいいの？
            </a>
        </h5>
        </div><!-- /.card-header -->
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            料金選びは100%ホストの裁量に任されています。 値付けの目安が欲しい場合には、お住まいの都市やエリアで類似のリスティングを検索すると大体の相場感がつかめます。
        </div><!-- /.card-body -->
        </div><!-- /.collapse -->
    </div><!-- /.card -->
    </div><!-- /#accordion -->
    </div>
</section>

<!-- アライアンス・パートナー -->
{{-- <section class="features-icons bg-light text-center py-5">
    <div class="container">
    <h2>アライアンス</h2>
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
</section> --}}


<!-- Footer -->
@include('parts.footer')
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    //
</script>


</body>

</html>