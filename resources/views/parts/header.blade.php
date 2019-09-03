
<!-- Styles -->

 <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">

        <style>
            header {
                position: fixed;
                top: 0;
                width: 100%;
                height: 80px;
                background-color: white;
                border-bottom: solid double #9b9999;
                color: #FE7A52;
                font-weight: bold;
                box-shadow: 2px 0.2px 8px #9b9999;
                padding: 0;
                margin: 0;
                z-index: 10;
                font-family: 'Righteous', cursive;
            }
    
            .top-right {
            position: absolute;
            right: 10px;
            top: 25px;
            }

            .title {
                font-size: 55px;
                left: 80px;
                /* text-shadow: 1px 2px 1px; */
                position: absolute;
            }

            header a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            }

            header a:hover {
            opacity: 0.5;
            }
    
            .m-b-md {
                margin-bottom: 30px;
                text-align: left;
            }
    
        </style>
    </head>
        
    
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#">VANLIFEBASES</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @if (Route::has('login'))
                    @auth
                        <div class="collapse navbar-collapse justify-content-end" id="navbar">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">予約一覧 <span class="sr-only">(現位置)</span></a>
                                </li>
                                <li class="nav-item active">
                                    
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト<span class="sr-only">(現位置)</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="collapse navbar-collapse justify-content-end" id="navbar">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">ログイン <span class="sr-only">(現位置)</span></a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                @endif
        </nav>



        {{-- <div class="title col-md-2">
            VANLIFEBASES
        </div> --}}



    </header>