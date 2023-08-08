<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, email=no, address=no">
  @if(config('app.env')!=='production')
  <meta name="robots" content="noindex,nofollow">
  @endif
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="{{ request()->routeIs('home')?'website':'article' }}">
  <meta property="og:title" content="@yield('title')">
  <meta property="og:description" content="@yield('description')">
  <meta property="og:url" content="{{ canonical() }}">
  <meta property="og:site_name" content="即BUY(ソクバイ)">
  <meta property="og:image" content="{{ asset('og_image.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/jpeg">
  <meta name="twitter:card" content="summary_large_image">
  @stack('meta')

  <link rel="canonical" href="{{ canonical() }}">
  <link rel="icon" type="image/ico" href="{{ asset('favicon.png') }}">
  <link rel="dns-prefetch" href="//apis.google.com/">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link rel="dns-prefetch" href="//platform.twitter.com/">
  <link rel="dns-prefetch" href="//connect.facebook.net/">
  <link rel="dns-prefetch" href="//www.facebook.com/">
  <link rel="dns-prefetch" href="//www.google-analytics.com/">

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <meta name="csrf_token" content="{{ csrf_token() }}">


  <link href="{{ asset('templates/frontend/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('templates/frontend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('templates/frontend/css/mypage.css') }}" rel="stylesheet">

  @stack('head')

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "即BUY(ソクバイ) TOP",
          "item": "{{ route(lp().'home') }}"
        }
        @if(\Route::currentRouteName() !== 'home'), {
          "@type": "ListItem",
          "position": 2,
          "name": "@yield('page_name')",
          "item": "{{ url()->current() }}"
        }
        @endif
      ]
    }
  </script>

</head>

<body class="{{ request()->routeIs(lp().'home')?'is-top':'' }}">
  @stack('open_body')
  <header class="header-contact">
    <div class="header">
      <div class="header-logo">
        <p><a href="{{ route(lp().'home') }}"><img src="{{ asset('templates/frontend/images/logo.png') }}" alt="即BUY(ソクバイ)" width="197" height="67"></a></p>
      </div>
      <div class="header-nav">

        <div id="navArea">
          <nav>
            <div class="inner">
              <ul>
                <li><a href="{{ route(lp().'home') }}">TOPページ</a></li>
                @guest
                <li>
                  <div class="contact-worry">
                    <div class="list-contact-worry">
                      <a class="mail" href="{{ route(lp().'register') }}">
                        <span class="small">新規の方はこちら</span>
                        <span class="big">
                          アカウント登録へ
                          <span class="law">
                            こちらから進みログイン用の<br>
                            アカウントを作成
                          </span>
                        </span>
                      </a>
                      <a class="phone" href="{{ route(lp().'login') }}">
                        <span class="small">登録済みの方はこちら</span>
                        <span class="big">
                          ログイン画面へ
                          <span class="law">
                            こちらへ進み<br>
                            マイページへログイン
                          </span>
                        </span>
                      </a>
                    </div>
                  </div>
                </li>
                @else
                <li>
                  <a class="btn btn-primary" href="{{ route(lp().'mypage') }}">
                    マイページへ移動
                  </a>
                </li>
                <li>
                  <a href="{{ route(lp().'profile') }}">プロフィール確認へ移動</a>
                </li>
                <li>
                  <a class="btn btn-primary" href="{{ route(lp().'applications.form') }}">
                    買取りフォームへ移動
                  </a>
                </li>
                @endguest
                <li>
                  <div class="logo-menu">
                    <p class="p-footer"><a href="{{ route(lp().'home') }}">
                        <img src="{{ asset('templates/frontend/images/logo.png') }}" alt="即BUY(ソクバイ)" width="197" height="67"></a></p>
                    <p class="info">お問い合わせはこちら<br>
                      TEL：<a href="tel:050-889-06589">050-889-06589</a><br>
                      営業時間：9時～18時（年中無休）</p>
                  </div>
                  <div class="other-menu">
                    <a href="{{ route(lp().'privacy-policy') }}">プライバシーポリシー</a>

                    @auth
                    <p>
                      <a class="btn btn-default btn-logout" href="{{ route(lp().'logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト　→
                      </a>
                    </p>
                    <form id="logout-form" action="{{ route(lp().'logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    @endauth
                  </div>
                </li>
              </ul>
            </div>
          </nav>
          <div class="toggle_btn">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div id="mask"></div>
        </div>
      </div>
      <div class="box-contact">

        @guest
        <a href="{{ route(lp().'register') }}" class="phone">
          <span>新規の方はこちらから</span>
          アカウント登録
        </a>
        <a href="{{ route(lp().'login') }}" class="mail">
          <span>ご登録済みの方はこちら</span>
          ログイン画面
        </a>
        @endguest
        @auth
        <a href="{{ route(lp().'mypage') }}" class="phone mypage">
          マイページへ移動
        </a>
        @endauth
      </div>
    </div>
  </header>
  @if(\Route::currentRouteName() !== lp().'home')
  <div id="breadcrumb">
    <div class="wrap">
      <a href="{{ route(lp().'home') }}">即BUY(ソクバイ) TOP</a>　>　<span class="breadcrumb_last" aria-current="page">@yield('page_name')</span>
    </div>
  </div>
  @endif
  @yield('content')
  <footer>
    <div class="container">
      <p class="logo-footer"><a href="{{ route(lp().'home') }}"><img src="{{ asset('templates/frontend/images/logo-footer.png') }}" alt="即BUY(ソクバイ)" width="197" height="64"></a></p>
      <p class="info">お問い合わせはこちら<br>
        TEL：<a href="tel:050-889-06589">050-889-06589</a><br>
        営業時間：9時～18時（年中無休）</p>
      <div class="ul-nav">
        <ul class="nav-footer">
          <li><a href="{{ route(lp().'home') }}">ホーム</a></li>

          @guest
          <li><a href="{{ route(lp().'register') }}">登録画面</a></li>
          <li><a href="{{ route(lp().'login') }}">ログイン画面</a></li>
          @else
          <li><a href="{{ route(lp().'applications.form') }}">買取りフォーム</a></li>
          @endguest
        </ul>
      </div>
      <div class="ul-nav">
        <ul class="nav-footer">
          <li><a href="{{ route(lp().'privacy-policy') }}">プライバシーポリシー</a></li>
        </ul>
      </div>


      <p class="copyright">Copyright © 2023 即BUY All Rights Reserved.</p>
      <p id="toTop" class="toTop"><a href="#"><img src="{{ asset('templates/frontend/images/toTop.png') }}" alt="TOPに戻る"></a></p>
      @guest
      <div class="navi_list lowhi sp-b">
        <div class="info">
          <a href="{{ route(lp().'register') }}" class="phone"><span>新規の方はこちらから</span>
            登録画面</a>
          <a href="{{ route(lp().'login') }}" class="mail"><span>ご登録済みの方はこちら</span>
            ログイン画面</a>
        </div>
      </div>
      @endguest
    </div>
  </footer>

  <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="768" height="800" viewBox="0 0 768 800">
    <defs>
      <g id="icon-close">
        <path class="path1" d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105 0.18-0.227 0.229-0.357 0.133-0.356 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357 0.228 0 0-0 0-0 0l-9.708 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z">
        </path>
      </g>
    </defs>
  </svg>
  <script src="{{ asset('templates/frontend/libs/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('templates/frontend/libs/aos/aos.js') }}"></script>
  <script src="{{ asset('templates/frontend/js/script.js') }}"></script>
  <script src="{{ asset('templates/frontend/js/main.js') }}"></script>

  @stack('footer')

</body>

</html>