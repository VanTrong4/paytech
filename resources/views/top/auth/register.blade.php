@extends('layouts.master')

@section('title', '会員登録 | PayTech(ペイテック)')
@section('description', 'PayTech(ペイテック)の会員登録ページになります。当サイトにログイン情報をお持ちたいの方は、こちらから会員登録お願いいたします。')
@section('page_name', '会員登録')


@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush

@section('content')
<main class="section__privacy page-section section ">
  <div class="wrap">
    <div id="breadcrumb">
      <div class="wrap">
        <a href="{{ route(lp().'home') }}">即BUY(ソクバイ) TOP</a>　&gt;　<span class="breadcrumb_last" aria-current="page">仮登録用フォーム</span>
      </div>
    </div>

    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">仮登録用フォーム</h1>
    </div>


    <form method="POST" action="{{ route(lp().'register') }}">
      @csrf
      <div class="tab current">
        <table class="table table-apply fadein" data-aos="show">
          <tbody>
            <tr>
              <th>
                <label for="name" class="ttl-group">
                  <span class="required">必須</span>お名前
                </label>
              </th>
              <td>
                <div class="form-group">
                  <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required placeholder="（例）売掛太郎">
                  @error('name')
                  <span class="help-block show" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <th>
                <label for="email" class="ttl-group">
                  <span class="required">必須</span>メールアドレス
                </label>
              </th>
              <td>
                <div class="form-group">
                  <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" required placeholder="※半角英数字でご入力">
                  @error('email')
                  <span class="help-block show" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <th>
                <label for="email_confirmation" class="ttl-group">
                  <span class="required">必須</span>メールアドレス（確認用）
                </label>
              </th>
              <td>
                <div class="form-group">
                  <input type="email" name="email_confirmation" id="email_confirmation" value="{{ old('email_confirmation') }}" class="form-control" required placeholder="※上記と同じメールアドレスを再度ご入力">
                </div>
              </td>
            </tr>
            <tr>
              <th>
                <label for="password" class="ttl-group">
                  <span class="required">必須</span>パスワード
                </label>
              </th>
              <td>
                <div class="form-group">
                  <div class="password-group">
                    <a class="view-pass" href="{{ url()->current() }}">
                      <img width="25" src="{{ asset('/templates/frontend/imgs/password-show.png') }}" alt="View">
                    </a>
                    <input type="password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="※半角英数字で8文字以上でご入力">
                  </div>
                  @error('password')
                  <span class="help-block show" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <th>
                <label for="password_confirmation" class="ttl-group">
                  <span class="required">必須</span>パスワード（確認用）
                </label>
              </th>
              <td>
                <div class="form-group">
                  <div class="password-group">
                    <a class="view-pass" href="{{ url()->current() }}">
                      <img width="25" src="{{ asset('/templates/frontend/imgs/password-show.png') }}" alt="View">
                    </a>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="※上記と同じパスワードを再度ご入力">
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="accept">
        <label>
          <input type="checkbox" name="accept" value="1">プライバシーポリシーに同意
        </label>
        @error('accept')
        <span class="help-block show" role="alert">
          <strong>※プライバシーポリシーについてに同意するをチェックしてください。</strong>
        </span>
        @enderror
      </div>
      <div class="form-action fadein" data-aos="show">
        <button type="submit" name="action" value="send" class="submit apply_link show">
          <span>送信する</span>
          <img src="{{ asset('templates/frontend/imgs/icon-arrow-right-white.svg') }}" width="30" height="30" alt="送信する">
        </button>
      </div>
    </form>
  </div>
</main>
@endsection


@push('footer')
<script src="{{ asset('templates/frontend/libs/jquery.jpostal.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/kana_text.js') }}"></script>
<script src="{{ asset('templates/frontend/js/form.js') }}"></script>
<script src="{{ asset('templates/frontend/js/register.js') }}"></script>
@endpush