@extends('layouts.master')


@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">顧客詳細ページ</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0 pb-3">
        <div class="table-responsive">
          <table class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th class="action"></th>
                <th class="text-center info info-customer">登録日</th>
                <th class="text-center info info-customer">名前</th>
                <th class="text-center info info-customer">フリガナ</th>
                <th class="text-center info info-customer">生年月日</th>
                <th class="text-center info info-customer">性別</th>
                <th class="text-center info info-customer">メールアドレス</th>
                <th class="text-center info info-customer">パスワード</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="action">
                  <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-block btn-primary" href="">編集</a>
                </td>
                <td class="created_at">{{ $user->created_at->format('Y年m月d日') }}</td>
                <td class="name">{{ $user->name }}</td>
                <td class="furigana">{{ $user->furigana }}</td>
                <td class="birthday">{{ $user->birthday->format('Y年m月d日') }}</td>
                <td class="gender">{{ $user->gender }}</td>
                <td class="email">{{ $user->email }}</td>
                <td class="hint">{{ $user->hint }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-1">
            <form method="POST" action="{{ route('admin.users.note', $user) }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="inputDescription">メモ</label>
                <textarea id="note" name="note" class="form-control" rows="4">{{ $user->note }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">
                メモ保存
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header p-0">
        <ul class="nav nav-pills nav-user-detail">
          <li class="nav-item"><a class="nav-link active" href="#applications" data-toggle="tab">お申込み内容一覧</a></li>
          <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">必要書類・写真の確認</a></li>
        </ul>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="tab-content pt-3">
          <div class="active tab-pane" id="applications">
            <div class="col-sm-12  pb-2 text-right">
              <a href="{{ route('admin.applications.export') }}?user={{ $user->id }}" class="btn btn-success btn-sm ml-1">CSVエクスポート</a>
            </div>
            @include('applications.list', ['applications' => $user->applications])
          </div>
          @php

          $selfies = $user->applications->where('photo_selfie', '!=', null)->count();
          $photo1 = $user->applications->where('photo_1', '!=', null)->count();
          $photo2 = $user->applications->where('photo_2', '!=', null)->count();
          $photo = $photo1 + $photo2;
          @endphp
          <div class="tab-pane" id="image">
            <div class="row">
              <div class="col-md-2">
                <ul class="nav nav-pills list-group list-group-unbordered mb-3 nav-user-detail nav-user-detail-file">
                  <li class="nav-item"><a class="nav-link active" href="#selfe" data-toggle="tab"> セルフィー（自画撮り）（{{ $selfies }}）</a></li>
                  <li class="nav-item"><a class="nav-link" href="#abc" data-toggle="tab">
                      運転免許証、または<br>
                      顔写真付きの身分証明書（{{ $photo }}）
                    </a></li>
                </ul>
              </div>
              <div class="col-md-10">
                <div class="tab-content">
                  <div class="active tab-pane" id="selfe">
                    <div class="row">
                      @foreach($user->applications as $application)
                      @if($application->photo_selfie)
                      <div class="col-md-3">
                        <div class="item-img">
                          <label>お申込み日</label>
                          <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                          <img src="{{ asset('storage/profile/'.$application->photo_selfie) }}" alt="">
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                  <div class=" tab-pane" id="abc">
                    <div class="row">
                      @foreach($user->applications as $application)
                      @if($application->photo_1)
                      <div class="col-md-3">
                        <div class="item-img">
                          <label>お申込み日</label>
                          <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                          <img src="{{ asset('storage/profile/'.$application->photo_1) }}" alt="">
                        </div>
                      </div>
                      @endif
                      @if($application->photo_2)
                      <div class="col-md-3">
                        <div class="item-img">
                          <label>お申込み日</label>
                          <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                          <img src="{{ asset('storage/profile/'.$application->photo_2) }}" alt="">
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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