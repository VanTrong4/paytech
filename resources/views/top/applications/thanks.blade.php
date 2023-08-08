@extends('layouts.master')

@section('title', '本登録用のフォームの送信完了 | 即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)の本登録用のフォームの送信完了のページになります。この度は当店へお申し込み頂き、誠にありがとうございました。')
@section('page_name', '本登録用のフォームの送信完了')

@push('meta')
<meta name="robots" content="noindex,nofollow">
@endpush

@section('content')
<section class="page-section section">
  <div class="">
    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">
        買取依頼のお申し込み<br>送信完了
      </h1>
    </div>
    <div class="text-content text-content-thanks fadein" data-aos="show">
      <p>この度はお申し込み頂き<br class="sp-b">誠にありがとうございます。</p>
      <p>
        ご記入頂いた情報は送信されました。<br>
        内容を確認のうえ、<br class="sp-b">担当者よりご連絡させて頂きます。<br>
        しばらくお待ちください。
      </p>
      <h3 class="title-pop"><span class="txt-yellow">即BUY</span>の<span class="txt-green">公式LINEアカウント</span></h3>
      <div class="des-pop">
        <p>
          この度は、即BUY(ソクバイ)サイトを<br>
          ご覧いただき誠にありがとうございます。
        </p>
        <p>
          以下のアカウントから<br>
          即BUY(ソクバイ)の公式アカウントを<br>
          友だち追加する事が可能になります。
        </p>
        <p>
          ご不明点や、ご質問などございましたら<br>
          LINEでお気軽にお問い合わせください！
        </p>
      </div>
      <div class="box-sub">
        <a href="http://line.me/R/ti/p/@262skhkq" target="_blank" rel="noopener noreferrer" class="low">
          <span class="title-box-sub">
            即BUY(ソクバイ)の公式LINE
          </span>
          <br><br>
          <span class="text-box-sub">
            下記のURLより<br class="sp-b">公式LINEアカウントを<br>
            登録する事ができます。<br>
            <br>
            即BUY(ソクバイ)<br>
            公式LINEアカウント<br>
            http://line.me/R/ti/p/@262skhkq
          </span><br><br>

          <span class="img-line"><img src="{{ asset('templates/frontend/imgs/line-img.png') }}" alt="line" width="100">
            <br><span>こちらをクリック</span></span>
        </a>
      </div>
      <div class="form-action">
        <a href="{{ route(lp().'mypage') }}" class="btn-back-home " data-aos="show">マイページへ戻る</a>
        <a class="btn-back-home" href="{{ route(lp().'home') }}">TOPへ戻る</a>
      </div>
    </div>
  </div>
</section>
@endsection