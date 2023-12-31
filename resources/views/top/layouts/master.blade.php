<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>@yield('title')</title>
    <link rel="canonical" href="{{ canonical() }}">
    <meta name="description" content="@yield('description')">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:type" content="{{ request()->routeIs('home')?'website':'article' }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="{{ canonical() }}">
    <meta property="og:site_name" content="PayTech(ペイテック)">
    <meta property="og:image" content="{{ asset('og_image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary_large_image">
    @stack('meta')

    <link rel="icon" type="image/ico" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('templates/frontend/css/amination.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">

    @stack('head')

    
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "PayTech(ペイテック)",
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

    <style>
        body,.quick-content{
            font-family: "Noto Sans JP",sans-serif !important;
        }
        @media screen and (max-width:768px) {
            .section__tech .container .content-tech .blue{
                font-size: 3.2rem !important;
            } 
        }
        
        #loading {
            width: 100vw;
            height: 100vh;
            -webkit-transition: all 1s;
            transition: all 1s;
            background-color: #fff;
            /* 以下のコードを追加 */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .loaded {
            opacity: 0;
            visibility: hidden;
        }
    </style>

</head>

<body>
    @stack('open_body')
    <div id="loading"></div>
    <header id="header">
        <div class="header">
            <div class="header-left">
                <div id="logo">
                    <a href="{{ route(lp().'home') }}">
                        <img src="{{ asset('templates/frontend/images/logo-header.png') }}" alt="PAYTECH ペイテック">
                    </a>
                    @auth
                        <form action="{{ route(lp().'logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="logout">
                        </form>   
                    @endauth
                </div>
            </div>
            <div class="header-right">

                <div class="contact-row">
                    <div class="btn"><a href="{{ route(lp().'contact') }}" class="blue">無料でお申し込み</a></div>

                </div>
                <div class="hd-menu">
                    <input id="menu-checkbox" type="checkbox" class="checkbox" aria-label="Menu">
                    <label for="menu-checkbox" class="span-container">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <div class="nav-container">
                        <a href="{{ route(lp().'home') }}">TOP</a>
                        <a href="{{ route(lp().'contact') }}">お申し込み</a>
                        <a href="{{ route(lp().'privacy-policy') }}">プライバシーポリシー</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="four-cols">
            <div class="col">
                <div class="sub">
                    <p class="title"><a href="{{ route(lp().'home') }}">
                            <img src="{{ asset('templates/frontend/images/logo-header.png') }}" alt="PAYTECH ペイテック">
                        </a></p>
    
                </div>
            </div>
            <div class="col">
                <div class="sub">
                    <ul class="nav-one">
                        <li><a href="{{ route(lp().'home') }}">TOP</a></li>
                        <li><a href="{{ route(lp().'contact') }}">お申し込み</a></li>
                        <li><a href="{{ route(lp().'privacy-policy') }}">プライバシーポリシー</a></li>
                    </ul>
                </div>
                <div class="sub social">
                    <strong>TEL：<a href="tel:03-5830-6464">03-5830-6464</a></strong><br>
                    営業時間：9：00〜18：00<br>
                    定休日：土日・祝日
                </div>
            </div>
        </div>
        <div class="copyright">(NEW2)Copyright © 2023 PayTech. All rights reserved.</div>
    </footer>
    <button id="back-to-top"><img src="{{ asset('templates/frontend/images/icon-circle-arrow-top.png') }}" width="48" height="48" alt="TOPに戻る"></button>
    
    <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap"
    rel="stylesheet">
    <script src="{{ asset('templates/frontend/libs/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('templates/frontend/libs/aos/aos.js') }}"></script>
    <script src="{{ asset('templates/frontend/js/script.js') }}"></script>
    <script>
        window.onload = function() {
            if ($('#loading').length) {
                const spinner = document.getElementById('loading');
                spinner.classList.add('loaded');
            }
        }
    </script>
    @stack('footer')

</body>
    
</html>