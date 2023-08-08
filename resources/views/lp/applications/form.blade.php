@extends('layouts.master')

@section('title', '買取りフォーム | 即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)の買取りフォームページになります。')
@section('page_name', '買取りフォーム')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush

@section('content')
<section id="contact" class="page-section section ">
  <div class="wrap">

    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">買取りフォーム</h1>
    </div>

    <div class="confirm-title">
      <strong>送信確認</strong>
      <p>以下の内容でよろしければ<br>『送信する』を押してください。</p>
    </div>

    <form id="form-profile" method="POST" action="{{ route(lp().'applications.form') }}" enctype="multipart/form-data">
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
      <div class="tab current">
        @include('applications.form_input')
      </div>
      <div class="tab ">
        @include('applications.form_confirm')
      </div>
      <div class="form-action">
        <a href="{{ route(lp().'mypage') }}" class="btn-back-home mypage">マイページへ戻る</a>
        <button type="button" class="btn-back-home previous">前へ戻る</button>
        <button type="button" class="btn-back-home next">確認画面へ</button>
        <button type="button" name="action" value="send" class="btn-back-home submit apply_link disabled">
          <span>送信する</span>
          <img src="{{ asset('templates/frontend/imgs/icon-arrow-right-white.svg') }}" width="30" height="30" alt="送信する">
        </button>
      </div>
      <div class="form-action">
        <p>

        </p>
      </div>
    </form>
  </div>
</section>
@endsection


@push('footer')
<script src="{{ asset('templates/frontend/libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/jquery.validate.additional-methods.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/jquery.jpostal.js') }}"></script>
<script src="{{ asset('templates/frontend/js/form.js') }}"></script>
<script src="{{ asset('templates/frontend/js/multi-form.js') }}"></script>
<script src="{{ asset('templates/frontend/js/application.js') }}"></script>
@endpush