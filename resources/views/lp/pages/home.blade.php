@extends('layouts.master')

@section('title', '即BUY(ソクバイ)｜商品券・ギフトカードなどをスピーディーに査定＆即日買取！簡単な手続きで商品は後日郵送もOK！')
@section('description', '商品券やギフトカードなどの買取なら即BUY(ソクバイ)にお任せ！手元にある不要な商品券などを、全国どこからでもスピーディーに査定＆高額買取いたします。安心・簡単な手続きで、お客様のご要望にお応えします。')

@push('head')
<link href="{{ asset('templates/frontend/css/index.css') }}" rel="stylesheet">
@endpush
@section('content')

<main>
  <div id="home-main">
    <h1>
      <img class="pc-b" src="{{ asset('templates/frontend/images/main.svg') }}" alt="不要な商品を最短10分で買取も可能！撮影した写真を送って高額＆即現金化！商品券やギフトカードを即買取！01：審査は一切無し！査定も無料！02：商品は後日郵送もOK！03：スマホがあればどこでも簡単申込！" width="1920" height="840">
      <img class="sp-b" src="{{ asset('templates/frontend/images/mainsp.svg') }}" alt="不要な商品を最短10分で買取も可能！撮影した写真を送って高額＆即現金化！商品券やギフトカードを即買取！01：審査は一切無し！査定も無料！02：商品は後日郵送もOK！03：スマホがあればどこでも簡単申込！" width="750" height="1026">
    </h1>
  </div>
  <div class="section__worry">
    <div class="container">
      <p class="big-text-yellow fadein" data-aos="show">WORRY</p>
      <div class="box-title-run">
        <h2 class="title-box fadein" data-aos="show"><span class="yellow">こんなお悩み</span><br class="sp-b">はありませんか？</h2>
      </div>
      <div class="list-people-talk fadein" data-aos="show">
        <div class="left fadein pc-b" data-aos="show"><img src="{{ asset('templates/frontend/images/man-qes.png') }}" alt="考えている男性" width="171" height="295"></div>
        <div class="flex-center sp-b">
          <div class="left fadein" data-aos="show"><img src="{{ asset('templates/frontend/images/man-qes.png') }}" alt="考えている男性" width="171" height="295"></div>
          <div class="right fadein" data-aos="show"><img src="{{ asset('templates/frontend/images/woman-qes.png') }}" alt="考えている女性" width="161" height="291"></div>
        </div>
        <div class="center">
          <div class="sub sub01">
            商品券を使うタイミングが<br>
            なくて困っている...
          </div>
          <div class="sub sub02">
            他での借り入れが<br>
            難しくて困っている...
          </div>
          <div class="sub sub03">
            急な出費で現金が<br>
            必要になった...
          </div>
          <div class="sub sub04">
            お店に行く時間がなくて<br>
            買取が難しい...
          </div>
          <div class="sub sub05">
            余っている<br>
            収入印紙を整理したい...
          </div>
        </div>
        <div class="right fadein pc-b" data-aos="show"><img src="{{ asset('templates/frontend/images/woman-qes.png') }}" alt="考えている女性"></div>
      </div>
      @guest
      <div class="contact-worry fadein" data-aos="show">
        <p class="des">
          お申し込みについて<br>
          当サイトは会員登録をお願いしております。
        </p>
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
      @endguest
    </div>
  </div>
  <div class="section__flow">
    <div class="container">
      <p class="big-text-yellow sp-b fadein" data-aos="show">FLOW</p>
      <div class="box-title-run">
        <h2 class="title-box fadein" data-aos="show">即BUYの<br><span class="yellow">ご利用の流れ</span></h2>
      </div>

      <div class="box-black fadein" data-aos="show">
        <p class="title">即日買取プラン</p>
      </div>

      <p class="content-flow fadein" data-aos="show">
        今すぐに現金化したいお客様にオススメ！
      </p>
      <p class="big-text-yellow pc-b fadein" data-aos="show">FLOW</p>
      <div class="list-step-flow ">
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-01.png') }}" alt="STEP1" width="146" height="146"></p>
          <p class="name">STEP 1</p>
          <p class="des">
            お手持ちの商品と必要書類を用意して、<br>
            当サイトの買取査定依頼フォームからお申し込みください。
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-02.png') }}" alt="STEP2" width="146" height="146"></p>
          <p class="name">STEP 2</p>
          <p class="des">
            お申し込み情報と買取商品の写真などを元に査定を行います。<br>
            査定後、買取代金にご満足いただければ、<br>
            先払いで口座へお振り込みいたします。
          </p>
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-03.png') }}" alt="STEP3" width="146" height="146"></p>
          <p class="name">STEP 3</p>
          <p class="des">
            買取代金のお振り込み後、商品の発送期限までに<br>
            買取商品を指定の住所へ郵送してください。</p>
        </div>
      </div>
      <div class="content-percent">
        <div class="percent">
          <div class="percent-title">即日買取プラン</div>
          <div class="percent-content">
            <div class="circel">換金率</div>
            <div class="text">50〜70%</div>
          </div>
        </div>
      </div>
      <div class="box-black fadein" data-aos="show">
        <p class="title">郵送買取プラン</p>
      </div>
      <p class="content-flow fadein" data-aos="show">
        時間を掛けて確実の高額買取をしたいお客様にオススメ！
      </p>
      <div class="list-step-flow des-right">
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-04.png') }}" alt="STEP1" width="146" height="146"></p>
          <p class="name">STEP 1</p>
          <p class="des">
            当サイトの買取査定依頼フォームから<br>
            お申込み後、指定の郵送先をお伝えしますので<br>
            売りたい商品をお手元にて郵送してください
          </p>
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-05.png') }}" alt="STEP2" width="146" height="146"></p>
          <p class="name">STEP 2</p>
          <p class="des">
            買取商品が到着後、査定を行い<br>
            買取金額をお伝えします。</p>
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="img"><img src="{{ asset('templates/frontend/images/flow-06.png') }}" alt="STEP3" width="146" height="146"></p>
          <p class="name">STEP 3</p>
          <p class="des">
            査定金額にご納得いただけましたら<br>
            即座にお客様の口座にお振込みいたします。
          </p>
        </div>
      </div>
      <div class="content-percent">
        <div class="percent">
          <div class="percent-title">郵送買取プラン</div>
          <div class="percent-content">
            <div class="circel">換金率</div>
            <div class="text"><small>最大</small>95%</div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="section__purchase">
    <div class="container">
      <div class="box-title-run">
        <h2 class="title-box fadein" data-aos="show">即BUYで<br><span class="yellow">買取可能な商品</span></h2>
      </div>
      <div class="list-box-pur">
        <div class="sub fadein" data-aos="show">
          <p class="name">商品券</p>
          <p class="des">主に全国百貨店共通商品券</p>
          <p class="img"><img src="{{ asset('templates/frontend/images/pur-01.png') }}" alt="商品券" width="324" height="157"></p>
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="name">ギフトカード</p>
          <p class="des">JCBなどクレジット会社発行するギフト券</p>
          <p class="img"><img src="{{ asset('templates/frontend/images/pur-02.png') }}" alt="ギフトカード" width="324" height="157"></p>
        </div>
        <div class="sub fadein" data-aos="show">
          <p class="name">収入印紙</p>
          <p class="des">未使用、汚れや破損などない状態の物</p>
          <p class="img"><img src="{{ asset('templates/frontend/images/pur-03.png') }}" alt="収入印紙" width="324" height="157"></p>
        </div>
      </div>
    </div>
  </div>
  @guest
  <div class="banner-contact fadein" data-aos="show">
    <div class="details">
      <div class="content">
        <p class="name">スマホがあれば<br>誰でも簡単にお申し込み可能！</p>
        <p class="des">
          不要な商品券・ギフトカード・収入印紙を<br>
          即日査定+即日買取が可能！<br>
          <br>
        </p>
        <a class="mail" href="{{ route(lp().'register') }}">
          <span class="small">即BUYにお任せください！</span>
          <span class="big">今すぐお申し込み</span></a>
        <p class="img-woman sp-b"><img src="{{ asset('templates/frontend/images/woman-brand.png') }}" alt="最短10分でお振込完了！" width="469" height="525"></p>
      </div>
    </div>
  </div>
  @endguest
  <div class="section__voice">
    <div class="container">
      <p class="big-text-yellow fadein" data-aos="show">VOICE</p>
      <div class="box-title-run">
        <h2 class="title-box fadein" data-aos="show">ご利用された<br><span class="yellow">お客様の声</span></h2>
      </div>
      <div class="list-voice fadein" data-aos="show">
        <div class="sub">
          <p class="name">20代 女性 Aさん</p>
          <p class="des">
            転勤のため引っ越しをすることになり、今まで余って不要になった商品券を買取してもらいました。他社で査定を依頼したときは時間がかかってストレスでしたが、こちらのサービスは即日で査定から振込まで対応いただき本当に早くて助かりました！面倒な手続きもなく、スマホで簡単に申し込みできるのも良かったですし、高額な買取価格も嬉しいポイントでした。今後も機会あればまたお願いしたいと思ってます
          </p>
        </div>
        <div class="sub">
          <p class="name">30代 男性 Sさん</p>
          <p class="des">
            急な出費があり、不要になった商品券とギフトカードを売りたくて、即BUYさんのサービスを利用しました。スマホで簡単に申し込みでき、本当に面倒な手続きも無かったですし、査定振込も即日で行ってくれたので、待つことなく大変満足しています。また、商品の発送は後日郵送でOKだったので、忙しくて時間が確保できない身としては本当に助かりました。今後も必要ない商品券があれば、即BUYさんを利用したいと思います！
          </p>
        </div>
      </div>
      @guest
      <div class="contact-worry fadein" data-aos="show">
        <p class="des">
          お申し込みについて<br>
          当サイトは会員登録をお願いしております。
        </p>
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
      @endguest
    </div>
  </div>
  <div class="section__qa">
    <div class="container">
      <p class="big-text-yellow fadein" data-aos="show">FAQ</p>
      <div class="box-title-run">
        <h2 class="title-box fadein" data-aos="show">よくある<span class="yellow">ご質問</span></h2>
      </div>
      <div class="content-qa fadein" data-aos="show">
        <button class="accordion fadein" data-aos="show">商品の郵送方法はどのようにすればいいですか？</button>
        <div class="panel fadein" data-aos="show">
          <p>
            指定の住所へ商品を送る場合は『レターパックプラス（赤色）』をご利用お願いします。<br>
            もし『レターパックプラス（赤色）』以外で郵送し、弊社へ届かなかった場合はお客さまのご負担になりますので、ご注意ください。
          </p>
        </div>
        <button class="accordion fadein" data-aos="show">家族や会社に通知などありますか？</button>
        <div class="panel fadein" data-aos="show">
          <p>
            即BUYのサービスは全てオンライン契約になる為、ご自宅やお勤め先にご連絡や書類の郵送などはございませんのでご安心ください。お客様の情報は厳重に管理し他者に漏れることは一切ございません。
          </p>
        </div>
        <button class="accordion fadein" data-aos="show">どんな状態の商品だと買取できないですか？</button>
        <div class="panel fadein" data-aos="show">
          <p>
            買取希望の商品の場合、使用済みの場合は買取できません。また汚れや破損がある場合は買取ができない場合もあります。査定依頼の際には、商品の状態をお知らせいただけるとスムーズに対応ができます。
          </p>
        </div>
        <button class="accordion fadein" data-aos="show">買取の際の手数料はいくらになりますか？</button>
        <div class="panel fadein" data-aos="show">
          <p>
            即BUYの買取サービスの選択プランや、商品の金額、種類や状態によって変動いたします。お申し込みの確認後、当社スタッフからご説明しますので、お気軽にご相談ください。
          </p>
        </div>
      </div>
    </div>
  </div>
  @include('pages.about')
</main>
@endsection
@push('footer')

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
</script>
@endpush