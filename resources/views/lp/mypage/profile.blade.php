@extends('layouts.master')

@section('title', 'プロフィールページ | 即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)のプロフィールページページになります。')
@section('page_name', 'プロフィールページ')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
<link href="{{ asset('templates/frontend/css/mypage.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="page-section section ">
  <div class="wrap">

    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">プロフィールページ</h1>
    </div>
    <div id="form-profile">
      @csrf
      <table class="table table-apply fadein" data-aos="show">
        <tbody>
          <tr>
            <th>名前</th>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <th>フリガナ</th>
            <td>{{ $user->furigana }}</td>
          </tr>
          <tr>
            <th>生年月日</th>
            <td>{{ $user->birthday->format('Y年m月d日') }}</td>
          </tr>
          <tr>
            <th>性別</th>
            <td>{{ $user->gender }}</td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>{{ $user->email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="form-action">
      <a href="{{ route(lp().'mypage') }}" class="btn-back-home btn-back-mypage aos-init aos-animate" data-aos="show">マイページへ移動</a>
    </p>
  </div>
</section>
@endsection