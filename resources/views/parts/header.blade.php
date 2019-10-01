<!-- Styles -->

<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">

<style>
    .top-right {
        position: absolute;
        right: 10px;
        top: 25px;
    }

    .title {
        font-size: 55px;
        left: 80px;
        position: absolute;
    }

    header {
        color: #636b6f;
        padding: 0 25px;
        font-size: 15px;
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

    .bg-dark {
        background-color: none !important;
    }

    .navbar-brand {
        margin-top: 10px;
        font-size: 22px;
    }

    .logo {
        width: 80px;
    }

    strong {
        color: green;
    }
</style>
</head>

<header>
    <nav class="navbar navbar-expand-sm fixed-top shadow navbar-light bg-light">
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="">
        <a class="navbar-brand" href="/"><strong>VANLIFE</strong>BASES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Route::has('login'))
        @auth
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
                {{-- 施設一覧ページ --}}
                <ul class="navbar-nav">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/storeslist') }}">施設一覧 <span class="sr-only">(現位置)</span></a>
                </li>
                @can('host-higher') {{-- ホスト権限以上に表示される --}}
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/booking') }}">予約一覧 <span class="sr-only">(現位置)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/hostbooking') }}">ホスト予約確認 <span class="sr-only">(現位置)</span></a>
                </li>
                @elsecan('user-higher') {{-- 一般権限以上に表示される --}}
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/booking') }}">予約一覧 <span class="sr-only">(現位置)</span></a>
                </li>
                @endcan
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
            {{-- 施設一覧ページ --}}
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="{{ url('/storeslist') }}">施設一覧 <span class="sr-only">(現位置)</span></a>
            </li>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">ログイン <span class="sr-only">(現位置)</span></a>
                </li>
            </ul>
        </div>
        @endauth
        @endif
    </nav>

</header>