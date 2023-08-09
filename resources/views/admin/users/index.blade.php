@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  pb-2 text-right">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">新規追加</a>
        <a href="{{ route('admin.users.export') }}" class="btn btn-success btn-sm ml-1">CSVエクスポート</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <form action="{{ route('admin.users.index') }}">
          <div class="form-inline mb-3">
            <div class="input-group">
              <input class="form-control" value="{{ request()->input('keyword') }}" name="keyword" type="search" placeholder="検索" aria-label="検索">
              <div class="input-group-append">
                <button class="btn btn-primary">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">顧客管理一覧</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th class="action"></th>
                <th class="action"></th>
                <th class="text-center info info-customer info-lp">登録元サイト</th>
                <th class="text-center info info-customer">登録日</th>
                <th class="text-center info info-customer">名前</th>
                <th class="text-center info info-customer">メールアドレス</th>
                <th class="text-center info info-customer">パスワード</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $key => $user)
              <tr class="tr-color-{{ $user->lastApplication?$user->lastApplication->status:'' }}">
                <td class="action">
                  <a href="{{ route('admin.users.detail', $user) }}" class="btn btn-block btn-success btn-sm" href="">
                    詳細
                  </a>
                </td>
                <td class="action">
                  <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-block btn-primary btn-sm" href="">
                    <i class="far fa-edit"></i> 編集
                  </a>
                </td>
                <td class="created_at">{{ strtoupper($user->prefix?:"top") }}</td>
                <td class="created_at">{{ $user->created_at->format('Y年m月d日') }}</td>
                <td class="name">{{ $user->name }}</td>
                <td class="email">{{ $user->email }}</td>
                <td class="hint">{{ $user->hint }}</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->

      @include('components.pagination',['items' => $users])
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal -->
<div id="application-modal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span id="popup_member_name"></span> - お申込み内容一覧</h4>
      </div>
      <div class="modal-body">
        <div id="applications"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('閉じる'); ?></button>
      </div>
    </div>

  </div>
</div>
@endsection
@push('footer')
<script>
  jQuery(function($) {

    $('#application-modal').on('shown.bs.modal', function(event) {
      const button = $(event.relatedTarget);
      const memberId = button.data('member_id');
      const memberName = button.data('member_name');
      $("#popup_member_name").text(memberName);
      $.ajax({
        url: `/admin/applications/${memberId}/member`,
        success: function(res) {
          $("#applications").html(res);
        }
      })
    });
    $('#application-modal').on('hide.bs.modal', function(event) {
      $("#popup_member_name").text('-------');
      $("#applications").html('')
    });


  })
</script>
@endpush