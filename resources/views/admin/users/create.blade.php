@extends('layouts.master')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item "><a href="{{ route('admin.users.index') }}">顧客管理一覧</a></li>
          <li class="breadcrumb-item active">新規追加</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 text-right">


      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">顧客管理一覧</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <form id="user-form" method="POST" action="{{ route('admin.users.store') }}">
          @csrf
          <div class="tab current">
            <table class="table table-apply">
              <tbody>
                <tr>
                  <th>
                    <label for="name" class="ttl-group">
                      <span class="required">必須</span>名前
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
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
                    <label for="furigana" class="ttl-group">
                      <span class="required">必須</span>フリガナ
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <input type="text" name="furigana" id="furigana" value="{{ old('furigana') }}" class="form-control  @error('furigana') is-invalid @enderror" required>
                      @error('furigana')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>
                    <label for="year" class="ttl-group">
                      <span class="required">必須</span>生年月日
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <div class="group-birthday">
                        <input type="tel" id="year" name="year" value="{{ old('year') }}" class="form-control  @error('year') is-invalid @enderror" placeholder="例：{{ date('Y') }}">
                        年
                        <input type="tel" id="month" name="month" value="{{ old('month') }}" class="form-control  @error('month') is-invalid @enderror" placeholder="{{ date('m') }}">
                        月
                        <input type="tel" id="day" name="day" value="{{ old('day') }}" class="form-control  @error('day') is-invalid @enderror" placeholder="{{ date('d') }}">
                        日
                      </div>
                      @if($errors->get('year') || $errors->get('month')|| $errors->get('day'))
                      <span class="help-block show" role="alert">
                        <strong>※生年月日を入力してください</strong>
                      </span>
                      @endif
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>
                    <label for="gender_1" class="ttl-group">
                      <span class="required">必須</span>性別
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <div class="group-radio">
                        <label>
                          <input type="radio" id="gender_1" name="gender" value="男性" required {{ old('gender')=="男性"?"checked":"" }}>
                          男性
                        </label>
                        <label>
                          <input type="radio" id="gender_2" name="gender" value="女性" required {{ old('gender')=="女性"?"checked":"" }}>
                          女性
                        </label>
                      </div>
                      @error('gender')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="form-title">＜ログイン用のメールアドレスとパスワード＞</div>
            <table class="table table-apply">
              <tbody>
                <tr>
                  <th>
                    <label for="email" class="ttl-group">
                      <span class="required">必須</span>メールアドレス
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" required placeholder="{{ '例：info@'.request()->getHost(); }}">
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
                      <input type="email" name="email_confirmation" id="email_confirmation" value="{{ old('email_confirmation') }}" class="form-control" required placeholder="{{ '例：info@'.request()->getHost(); }}">

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
                      <input type="password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror" required autocomplete="new-password">
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
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">

                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-action">
            <button type="submit" name="action" value="send" class="btn btn-primary">
              <span>送信する</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection