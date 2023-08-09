<div class="table-responsive">
  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <th colspan="4"></th>
        <th class="text-center info info-customer" colspan="7">顧客情報</th>
        <th class="text-center info info-live" colspan="8">お住まいの情報 </th>
        <th class="text-center info info-work" colspan="6">勤務先の情報</th>
        <th class="text-center info info-account" colspan="6">口座番号</th>
      </tr>
      <tr>
        <th class="action action-status">ステータス</th>
        <th class="action">契約書PDF</th>
        <th class="action">写真確認</th>
        <th class="action">詳細</th>
        <th class="info info-customer info-lp">登録元サイト</th>
        <th class="info info-customer">お申込み日</th>
        <th class="info info-customer">名前</th>
        <th class="info info-customer">フリガナ</th>
        <th class="info info-customer">生年月日</th>
        <th class="info info-customer">性別</th>
        <th class="info info-customer">メールアドレス</th>
        <th class="info info-customer">パスワード</th>

        <th class="info info-live">ご希望の連絡方法</th>
        <th class="info info-live">LINE ID</th>
        <th class="info info-live">郵便番号</th>
        <th class="info info-live">都道府県</th>
        <th class="info info-live">市区町村</th>
      </tr>
    </thead>
    <tbody>
      @foreach($applications as $key => $application)
      <tr class="tr-color-{{ $application->status }}">
        <td class="action application-status">
          <span class="status status-{{ $application->status }}"></span>
          <select name="status" class="form-control form-control-sm" data-id="{{ $application->id }}">
            @foreach(list_status() as $status)
            <option value="{{ $status }}" {{ $status==$application->status?'selected':'' }}>{{ application_status_admin($status) }}</option>
            @endforeach
          </select>
        </td>
        <td class="action">
          <a href="{{ route('admin.applications.pdf', $application ) }}" class="btn btn-block btn-sm btn-default">
            <i class="far fa-file-pdf"></i> PDF化
          </a>
        </td>
        <td class="action">
          <button class="btn btn-sm btn-block btn-default btn-pdf-img" data-toggle="modal" data-target="#preview-image-modal" data-id="{{ $application->id }}">
            <i class="far fa-image"></i> 写真
          </button>
          <div class="d-none">
            <p>買取希望商品</p>
            @if($application->photo_wish_item)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_wish_item) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_wish_item) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif

            <hr>
            <p>セルフィー（自画撮り）</p>
            @if($application->photo_selfie)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_selfie) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_selfie) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <hr>
            <p>運転免許証、または顔写真付きの身分証明書 </p>
            <p>※表面</p>
            @if($application->photo_1)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_1) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_1) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif

            <p>※裏面</p>
            @if($application->photo_2)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_2) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_2) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <br>
            @if($application->photo_3)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_3) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_3) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <hr>
            <p>保険証</p>
            @if($application->photo_insurance_card)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_insurance_card) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_insurance_card) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <hr>
            <p>その他の画像</p>
            @if($application->photo_other)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_other) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_other) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <p>その他の画像①</p>
            @if($application->photo_other_1)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_other_1) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_other_1) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <p>その他の画像②</p>
            @if($application->photo_other_2)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_other_2) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_other_2) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
            <p>その他の画像③</p>
            @if($application->photo_other_3)
            <div class="img-download-wrap">
              <img loading="lazy" src="{{ asset('storage/profile/'.$application->photo_other_3) }}" alt="">
              <a href="{{ asset('storage/profile/'.$application->photo_other_3) }}" download>
                <i class="fas fa-download"></i> ダウンロードする
              </a>
            </div>
            @endif
          </div>
        </td>
        <td class="action">
          <a href="{{ route('admin.applications.edit', $application ) }}" class="btn btn-block btn-sm btn-default">
            <i class="far fa-edit"></i> 詳細
          </a>
        </td>
        <td>{{ strtoupper($application->prefix?:"top") }}</td>
        <td class="application_at info info-customer">{{ $application->created_at->format('Y年m月d日') }}</td>
        <td class="name info info-customer">{{ $application->user->name }}</td>
        <td class="email info info-customer">{{ $application->user->email }}</td>
        <td class="hint info info-customer">{{ $application->user->hint }}</td>
        <td class="preferred_contact info info-live">{{ $application->address }}</td>
        <td class="line_id info info-live">{{ $application->phonenumber }}</td>
        <td class="zipcode info info-live">{{ $application->email }}</td>
        <td class="prefect info info-live">{{ $application->company }}</td>
        <td class="district info info-live">{{ $application->fullname }}</td>
        <td class="address info info-live">{{ $application->amount }}</td>
        <td class="apartment_room info info-live">{{ $application->format }}</td>
        <td class="phone_number info info-live">{{ $application->company_office }}</td>
        <td class="company_zipcode info info-work">{{ $application->company_address }}</td>
        <td class="company_prefect  info info-work">{{ $application->company_other }}</td>
        <td class="company_district info info-work">{{ $application->company_phone_my }}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@push('footer')

<!-- Modal -->
<div id="preview-image-modal" class="modal fade" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div id="preview-image"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('閉じる'); ?></button>
      </div>
    </div>

  </div>
</div>
<script>
  $(document).ready(function() {
    $("[name='status']").change(function() {
      const status = $(this).val();
      const id = $(this).data('id');

      $(this).prev('.status').removeAttr('class').addClass(`status status-${status} `);
      $(this).closest('tr').removeAttr('class').addClass(`tr-color-${status} `);
      $.ajax({
        type: 'PUT',
        url: `{{ route("admin.applications.update_status") }}`,
        data: {
          status: status,
          id: id
        },
        success: function(res) {}
      });
    });

    $(".btn-delete").click(function(event) {
      const formEle = $(this).data('form');
      const confirm = alertify.confirm('【このお申込み内容 削除確認】', `このお申込み内容を削除します。<br />本当に削除しますか？`, function() {
        $(formEle).submit();
      }, function() {
        this.close();
      }).set('labels', {
        ok: 'はい',
        cancel: 'キャンセル'
      });
    });

    $('#preview-image-modal').on('shown.bs.modal', function(event) {
      const button = $(event.relatedTarget);
      $("#preview-image").html($(button).next('div').html());
    });
    $('#preview-image-modal').on('hide.bs.modal', function(event) {
      $("#preview-image").html("");
    });
  })
</script>
@endpush