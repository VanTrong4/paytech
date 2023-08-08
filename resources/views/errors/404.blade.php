@extends('top.layouts.master')

@section('title', config('app.site_name')."｜スマホ1つで商品券を先払いで買取！商品は後日郵送OK！")
@section('description', '商品券やギフトカードなどの買取なら'.config('app.site_name').'にお任せください！お手持ちの不要な商品券などを、全国いつでもどこからでもすぐに査定＆高額買取が可能。安心・簡単・スピーディーな買取をお約束します。')
@section('page_name', '404 Not Found')
@push('head')
<link href="{{ asset('templates/frontend/css/index.css') }}" rel="stylesheet">
@endpush
@section('content')

<main class="page-section">
  <section class="wrap">
    <div class="container">
      <div class="notfound-content">
        <div class="box-title-run" style="margin-bottom: 2rem;">
          <h1 class="title-box title-privacy fadein" data-aos="show">404 Not Found</h1>
        </div>
        <p>お探しのページが見つかりませんでした。 </p>
        <p>URLが間違っているか</p>
        <p>ページが存在してない可能性がございます。</p>
        <p class="btn-back-home">
          <a href="{{ route('home') }}">TOPへ戻る</a>
        </p>
      </div>
    </div>
  </section>
</main>
@endsection