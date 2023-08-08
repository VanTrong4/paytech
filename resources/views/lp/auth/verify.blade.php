@extends('layouts.master')

@section('title', 'お客様のメールアドレスは仮登録の状態になります。｜即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)のお客様のメールアドレスは仮登録の状態になります。のページになります。この度は当店へお申し込み頂き、誠にありがとうございました。')
@section('page_name', 'お客様のメールアドレスは仮登録の状態になります。')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush
@section('content')

<section class="page-section section ">


  <div class="wrap">

    <div class="box-title-run" bis_skin_checked="1">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">
        お客様のメールアドレスは<br>
        仮登録の状態になります。
      </h1>
    </div>
    <div class="text-content">
      @if (session('resent'))
      <div class="alert alert-success" role="alert">
        新しい確認用URLはあなたのメールアドレスに送信されました。
      </div>
      @else
      <p>
        現在、お客様のメールアドレスは承認されておりません。<br>
        仮登録時、入力したメールアドレスに承認用の確認メールを<br>
        お送りしておりますので、受信確認をお願いいたします。
      </p>
      <p>確認メールが届いてない場合は<br>一度お問い合わせください。</p>
      <p class="text-tel">
        電話番号<br>
        <a href="tel:050-889-06589">050-889-06589</a>
      </p>
      <div class="form-action">
        <a href="{{ route(lp().'home') }}" class="btn-back-home">TOPへ戻る</a>
        <a class="btn  submit show btn-back-home" href="{{ route(lp().'logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span>ログアウト</span><img src="{{ asset('templates/frontend/imgs/icon-arrow-right-white.svg') }}" width="30" height="30" alt="送信する">
        </a>
      </div>
      <form id="logout-form" action="{{ route(lp().'logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      @endif
    </div>
  </div>
</section>
@endsection