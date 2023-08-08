@extends('layouts.master')

@section('title', '登録送信完了｜即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)の登録送信完了のページになります。この度は当店へお申し込み頂き、誠にありがとうございました。')
@section('page_name', '登録送信完了')

@push('meta')
<meta name="robots" content="noindex,nofollow">
@endpush

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush


@push('open_body')
<img src="https://s3.aspservice.jp/asp/track.php?p=649bdc543be89&t=649bdc54" width="1" height="1" />
@endpush
@section('content')
<section class="page-section section">
  <div class="wrap">
    <div class="box-title-run" bis_skin_checked="1">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">
        仮登録<br>送信完了
      </h1>
    </div>
    <div class="text-content fadein" data-aos="show">
      <p>
        この度はお申し込み頂き<br class="sp-b">誠にありがとうございます。<br>
        現状、仮登録を完了しメールアドレスへ<br class="sp-b">確認用の認証メールを送信しました。<br>
        認証メールをご確認後、<br class="sp-b">本登録へお進みください。
      </p>
      <div class="line-in-thank">
        ※仮登録についてご案内<br>
        <br>
        認証メールが届かなかったお客様は<br>
        <a href="tel:050-889-06589">TEL：050-889-06589</a><br>
        こちらにお電話を頂くか<br>
        <a href="https://line.me/R/ti/p/@262skhkq">LINE ID：@262skhkq</a><br>
        で友達追加の上ご連絡下さい。
      </div>

      <p class="btn-back-home">
        <a href="{{ route(lp().'home') }}">TOPへ戻る</a>
      </p>
    </div>
  </div>
</section>
@endsection