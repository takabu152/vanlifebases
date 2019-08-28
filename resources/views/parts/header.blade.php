 <!-- Styles -->
        <style>
            header {
                position: fixed;
                top: 0;
                width: 100%;
                height: 80px;
                background-color: white;
                border-bottom: solid double #9b9999;
                color: #FD7B51;
                font-weight: bold;
                box-shadow: 2px 0.2px 8px #9b9999;
                padding: 0;
                margin: 0;
                z-index: 10;
            }
    
            .top-right {
            position: absolute;
            right: 10px;
            top: 25px;
            }

            .title {
                font-size: 55px;
                left: 120px;
                /* text-shadow: 1px 2px 1px; */
                position: absolute;
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

            a:hover {
            opacity: 0.5;
            }
    
            .m-b-md {
                margin-bottom: 30px;
                text-align: left;
            }
    
        </style>
    </head>
        
    
    <header>

        <div class="title m-b-md">
            VanLifeBases
        </div>

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">ユーザー登録</a>
            @endauth
        </div>
        @endif

    </header>