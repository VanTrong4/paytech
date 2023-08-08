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
      <br>
      <br>
      <div class="form-action">
        <a href="{{ route(lp().'mypage') }}" class="btn-back-home " data-aos="show">マイページへ戻る</a>
        <a class="btn-back-home" href="{{ route(lp().'home') }}">TOPへ戻る</a>
      </div>
    </div>
  </div>
</section>
@endsection
