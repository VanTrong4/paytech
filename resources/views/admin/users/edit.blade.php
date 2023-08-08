@extends('layouts.master')


@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">顧客管理一覧</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body ">
        <form id="user-form" method="POST" action="{{ route('admin.users.update', $user) }}">
          @csrf
          @method('PUT')
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
                      <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
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
                      <input type="text" name="furigana" id="furigana" value="{{ old('furigana', $user->furigana) }}" class="form-control  @error('furigana') is-invalid @enderror" required>
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
                        <input type="tel" id="year" name="year" value="{{ old('year', $user->birthday->format('Y')) }}" class="form-control  @error('year') is-invalid @enderror" placeholder="例：1987">
                        年
                        <input type="tel" id="month" name="month" value="{{ old('month', $user->birthday->format('m')) }}" class="form-control  @error('month') is-invalid @enderror" placeholder="06">
                        月
                        <input type="tel" id="day" name="day" value="{{ old('day', $user->birthday->format('d')) }}" class="form-control  @error('day') is-invalid @enderror" placeholder="05">
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
                          <input type="radio" id="gender_1" name="gender" value="男性" required {{ old('gender', $user->gender)=="男性"?"checked":"" }}>
                          男性
                        </label>
                        <label>
                          <input type="radio" id="gender_2" name="gender" value="女性" required {{ old('gender', $user->gender)=="女性"?"checked":"" }}>
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
                      <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control  @error('email') is-invalid @enderror" required placeholder="{{ '例：info@'.request()->getHost(); }}">
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
                    <label for="password" class="ttl-group">
                      <span class="required">必須</span>パスワード
                    </label>
                  </th>
                  <td>
                    <div class="form-group">
                      <div class="password-group">
                        <a class="view-pass" type="button">
                          <img width="25" src="{{ asset('/templates/frontend/imgs/password-show.png') }}" alt="View">
                        </a>
                        <input type="password" id="password" value="{{ old('password', $user->hint) }}" name="password" class="form-control  @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="※半角英数字で8文字以上でご入力">
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
                        <a class="view-pass" type="button">
                          <img width="25" src="{{ asset('/templates/frontend/imgs/password-show.png') }}" alt="View">
                        </a>
                        <input type="password" id="password_confirmation" value="{{ old('password_confirmation', $user->hint) }}" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="※上記と同じパスワードを再度ご入力">
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- <tr>
                  <th>Verify</th>
                  <td>
                    <div class="switch-box td-text" bis_skin_checked="1">
                      <input type="checkbox" name="verify" value="verify" class="switch-verify" id="switch-verify-{{ $user->id }}" {{ old('email_verified_at', $user->email_verified_at)?"checked":"" }}>
                      <label for="switch-verify-{{ $user->id }}"></label>
                    </div>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
          <div class="form-action">
            <button type="submit" name="action" value="send" class="btn btn-primary">
              <span>登録する</span>
            </button>

            <a class="btn btn-danger btn-delete ml-1" data-message="{{ __('Are you sure you want to delete ') }}" data-form="#delete_{{ $user->id }}">
              <i class="fa fa-trash"></i> 削除
            </a>
          </div>
        </form>
        <form id="delete_{{ $user->id }}" style="display:none" method="POST" action="{{route('admin.users.destroy',['user'=>$user])}}">
          {{ csrf_field() }}
          @method('DELETE')
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('footer')
<script>
  jQuery(function($) {
    $(".btn-delete").click(function(event) {
      const formEle = $(this).data('form');
      const confirm = alertify.confirm('【この顧客 削除確認】', `この顧客を削除します。<br />本当に削除しますか？`, function() {
        $(formEle).submit();
      }, function() {
        this.close();
      }).set('labels', {
        ok: 'はい',
        cancel: 'キャンセル'
      });
    });
  })
</script>
@endpush