@extends('layouts.master')

@section('title', '会員ログイン | 即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)のログインページになります。ログイン情報をお持ちの方は、こちらのページからログイン後、お進みください。')
@section('page_name', '会員ログイン')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush

@section('content')
<section id="contact" class="page-section section ">
  <div class="wrap">

    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">会員ログイン</h1>
    </div>

    <div id="form-login">
      <form method="POST" action="{{ route(lp().'login') }}">
        @csrf
        <div class="tab current">
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th>
                  <label for="email" class="ttl-group">
                    メールアドレス
                  </label>
                </th>
                <td>
                  <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @if($errors->any())
                    <span class="help-block show" role="alert">
                      <strong>* メールアドレスとお客様情報が一致しません</strong>
                    </span>
                    @enderror
                  </div>
                </td>
              </tr>
              <tr>
                <th>
                  <label for="password" class="ttl-group">
                    パスワード
                  </label>
                </th>
                <td>
                  <div class="form-group">
                    <div class="password-group">
                      <a class="view-pass" href="{{ url()->current() }}">
                        <img width="25" src="{{ asset('/templates/frontend/imgs/password-show.png') }}" alt="View">
                      </a>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="form-action fadein" data-aos="show">
          <button type="submit" name="action" value="send" class="submit apply_link show">
            <span> ログイン </span>
            <img src="{{ asset('templates/frontend/imgs/icon-arrow-right-white.svg') }}" width="30" height="30" alt="送信する">
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection


@push('footer')
<script src="{{ asset('templates/frontend/libs/jquery.jpostal.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/kana_text.js') }}"></script>
<script src="{{ asset('templates/frontend/js/form.js') }}"></script>
@endpush