@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  pb-2 text-right">
        <a href="{{ route('admin.antique_ledgers.create') }}" class="btn btn-primary btn-sm">新規追加</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <form action="{{ route('admin.antique_ledgers.index') }}">
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
        <h3 class="card-title">古物台帳</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th colspan="11" class="text-center bg-gray">受入れ</th>
                <th class="text-center th-yellow" rowspan="3" style="min-width: 200px">備考</th>
                <th class="action" rowspan="3"></th>
              </tr>
              <tr>
                <th class="text-center th-yellow" rowspan="2" style="min-width: 160px">年月日</th>
                <th class="text-center th-yellow" rowspan="2" style="min-width: 160px">区別</th>
                <th class="text-center th-yellow" colspan="4">取引した古物</th>
                <th class="text-center th-yellow" rowspan="2" style="min-width: 160px">確認方法</th>
                <th class="text-center th-yellow" colspan="4">取引の相手方</th>
              </tr>
              <tr>
                <th class="text-center th-yellow" style="min-width: 160px">品名</th>
                <th class="text-center th-yellow" style="min-width: 160px">特徴</th>
                <th class="text-center th-yellow" style="min-width: 160px">数量</th>
                <th class="text-center th-yellow" style="min-width: 160px">代価</th>
                <th class="text-center th-yellow" style="min-width: 160px">住所</th>
                <th class="text-center th-yellow" style="min-width: 160px">氏名</th>
                <th class="text-center th-yellow" style="min-width: 160px">年齢</th>
                <th class="text-center th-yellow" style="min-width: 160px">職業</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $key => $item)
              <tr>
                <td>{{ $item->date->format('Y年m月d日') }}</td>
                <td>{{ $item->distinction }}</td>
                <td>{{ $item->traded_product_name }}</td>
                <td>{{ $item->traded_feature }}</td>
                <td>{{ $item->traded_quantity }}</td>
                <td>{{ $item->traded_price }}</td>
                <td>{{ $item->confirmation_method }}</td>
                <td>{{ $item->counterparty_address }}</td>
                <td>{{ $item->counterparty_name }}</td>
                <td>{{ $item->counterparty_age }}</td>
                <td>{{ $item->counterparty_profession }}</td>
                <td>{{ $item->remarks }}</td>
                <td class="action">
                  <a href="{{ route('admin.antique_ledgers.edit', $item) }}" class="btn btn-block btn-primary btn-sm" href="">
                    <i class="far fa-edit"></i> 編集
                  </a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->

      @include('components.pagination', ['items'=>$items])
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