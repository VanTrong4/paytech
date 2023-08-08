@extends('layouts.master')


@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 text-right">


      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">お申込み内容一覧</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form id="application-form" method="POST" action="{{ route('admin.applications.update', $application) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="referer" value="{{ request()->headers->get('referer') }}">
          <h4>顧客情報</h4>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th class="info info-customer">お申込み日</th>
                <td class="application_at">{{ $application->created_at->format('Y年m月d日') }}</td>
              </tr>
              <tr>
                <th class="info info-customer info-customer-status">ステータス</th>
                <td class="status"> <span class="status status-{{ $application->status }}">{{ application_status_admin($application->status) }}</span></td>
              </tr>
              <tr>
                <th class="info info-customer">名前</th>
                <td class="name">{{ $application->user->name }}</td>
              </tr>
              <tr>
                <th class="info info-customer">フリガナ</th>
                <td class="furigana">{{ $application->user->furigana }}</td>
              </tr>
              <tr>
                <th class="info info-customer">生年月日</th>
                <td class="birthday">{{ $application->user->birthday->format('Y年m月d日') }}</td>
              </tr>
              <tr>
                <th class="info info-customer">性別</th>
                <td class="gender">{{ $application->user->gender }}</td>
              </tr>
              <tr>
                <th class="info info-live">ご希望の連絡方法</th>
                <td class="preferred_contact">{{ $application->preferred_contact }}</td>
              </tr>
              <tr>
                <th class="info info-live">LINE ID</th>
                <td class="line_id">{{ $application->line_id }}</td>
              </tr>
            </tbody>
          </table>
          <h4>お住まいの情報</h4>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th class="info info-live">郵便番号</th>
                <td class="zipcode">{{ $application->zipcode }}</td>
              </tr>
              <tr>
                <th class="info info-live">都道府県</th>
                <td class="prefect">{{ $application->prefect }}</td>
              </tr>
              <tr>
                <th class="info info-live">市区町村</th>
                <td class="district">{{ $application->district }}</td>
              </tr>
              <tr>
                <th class="info info-live">番地</th>
                <td class="address">{{ $application->address }}</td>
              </tr>
              <tr>
                <th class="info info-live">マンション名・部屋番号</th>
                <td class="apartment_room">{{ $application->apartment_room }}</td>
              </tr>
              <tr>
                <th class="info info-live">連絡先(電話番号)</th>
                <td class="apartment_room">{{ $application->phone_number }}</td>
              </tr>
            </tbody>
          </table>
          <h4>勤務先の情報</h4>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th class="info info-work">郵便番号</th>
                <td class="company_zipcode">{{ $application->company_zipcode }}</td>
              </tr>
              <tr>
                <th class="info info-work">都道府県</th>
                <td class="company_prefect">{{ $application->company_prefect }}</td>
              </tr>
              <tr>
                <th class="info info-work">市区町村</th>
                <td class="company_district">{{ $application->company_district }}</td>
              </tr>
              <tr>
                <th class="info info-work">番地</th>
                <td class="company_address">{{ $application->company_address }}</td>
              </tr>
              <tr>
                <th class="info info-work">マンション名・部屋番号</th>
                <td class="company_apartment_room">{{ $application->company_apartment_room }}</td>
              </tr>
              <tr>
                <th class="info info-work">電話番号</th>
                <td class="company_phonenumber">{{ $application->company_phonenumber }}</td>
              </tr>
            </tbody>
          </table>
          <h4>口座番号</h4>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th class="info info-account">銀行名</th>
                <td class="bank_name">{{ $application->bank_name }}</td>
              </tr>
              <tr>
                <th class="info info-account">支店名</th>
                <td class="branch_name">{{ $application->branch_name }}</td>
              </tr>
              <tr>
                <th class="info info-account">支店番号</th>
                <td class="branch_number">{{ $application->branch_number }}</td>
              </tr>
              <tr>
                <th class="info info-account">口座の種類</th>
                <td class="account_type">{{ $application->account_type }}</td>
              </tr>
              <tr>
                <th class="info info-account">口座番号</th>
                <td class="account_number">{{ $application->account_number }}</td>
              </tr>
              <tr>
                <th class="info info-account">口座名義(カナ)</th>
                <td class="account_name_kana">{{ $application->account_name_kana }}</td>
              </tr>
            </tbody>
          </table>
          <h4>必要書類の添付</h4>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th class="info info-account">買取希望商品</th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_wish_item" name="photo_wish_item" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_wish_item_preview">
                    @if($application->photo_wish_item)
                    <img src="{{ asset('storage/profile/'.$application->photo_wish_item) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_wish_item) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">セルフィー（自画撮り）</th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_selfie" name="photo_selfie" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_selfie_preview">
                    @if($application->photo_selfie)
                    <img src="{{ asset('storage/profile/'.$application->photo_selfie) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_selfie) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  運転免許証、または<br>
                  顔写真付きの身分証明書
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_1" name="photo_1" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_1_preview">
                    @if($application->photo_1)
                    <img src="{{ asset('storage/profile/'.$application->photo_1) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_1) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>

                  <p>※裏面</p>
                  <div class="control">
                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_2_preview">
                    @if($application->photo_2)
                    <img src="{{ asset('storage/profile/'.$application->photo_2) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_2) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                  <br>
                  <div class="control">
                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_3_preview">
                    @if($application->photo_3)
                    <img src="{{ asset('storage/profile/'.$application->photo_3) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_3) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  保険証
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_insurance_card" name="photo_insurance_card" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_insurance_card_preview">
                    @if($application->photo_insurance_card)
                    <img src="{{ asset('storage/profile/'.$application->photo_insurance_card) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_insurance_card) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  その他の画像
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_other" name="photo_other" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_other_preview">
                    @if($application->photo_other)
                    <img src="{{ asset('storage/profile/'.$application->photo_other) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_other) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  その他の画像①
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_other_1" name="photo_other_1" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_other_1_preview">
                    @if($application->photo_other_1)
                    <img src="{{ asset('storage/profile/'.$application->photo_other_1) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_other_1) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  その他の画像②
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_other_2" name="photo_other_2" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_other_2_preview">
                    @if($application->photo_other_2)
                    <img src="{{ asset('storage/profile/'.$application->photo_other_2) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_other_2) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  その他の画像③
                </th>
                <td>
                  <div class="control">
                    <input type="file" id="photo_other_3" name="photo_other_3" accept="image/*">
                  </div>
                  <div class="img-download-wrap" id="photo_other_3_preview">
                    @if($application->photo_other_3)
                    <img src="{{ asset('storage/profile/'.$application->photo_other_3) }}" alt="">
                    <a href="{{ asset('storage/profile/'.$application->photo_other_3) }}" download>
                      <i class="fas fa-download"></i> ダウンロードする
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <th class="info info-account">
                  その他
                </th>
                <td style="white-space: break-spaces;">{{ $application->other }}</td>
              </tr>
            </tbody>
          </table>
          <h4>契約状況</h4>

          <div class="form-title fadein" data-aos="show">＜お住まいの情報＞</div>
          <table class="table table-apply fadein" data-aos="show">
            <tbody>
              <tr>
                <th>ステータス</th>
                <td>
                  <div class="input-group">
                    <div class="application-status">
                      <span class="status status-{{ $application->status }}"></span>
                      <select name="status" class="form-control form-control-sm" data-id="{{ $application->id }}">
                        @foreach(list_status() as $status)
                        <option value="{{ $status }}" {{ $status==$application->status?'selected':'' }}>{{ application_status_admin($status) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th>会員番号</th>
                <td>{{ $application->member_id }}</td>
              </tr>
              <tr>
                <th>広告コード</th>
                <td>
                  <input type="text" class="form-control" name="contract_ad_code" value="{{ old('contract_ad_code', $application->contract_ad_code) }}" class="form-control  @error('contract_ad_code') is-invalid @enderror">
                </td>
              </tr>
              <tr>
                <th>契約日</th>
                <td>
                  <input type="date" class="form-control" name="contract_date" value="{{ old('contract_date', $application->contract_date_input) }}" class="form-control  @error('contract_date') is-invalid @enderror">
                  <?php /*
                    <div class="group-birthday">
                    <input type="tel" id="contract_date_year" name="contract_date_year" value="{{ old('contract_date_year', $application->contract_date?$application->contract_date->format('Y'):'') }}" class="form-control  @error('contract_date_year') is-invalid @enderror" placeholder="例：{{ date('Y') }}">
                    年
                    <input type="tel" id="contract_date_month" name="contract_date_month" value="{{ old('contract_date_month', $application->contract_date?$application->contract_date->format('m'):'') }}" class="form-control  @error('contract_date_month') is-invalid @enderror" placeholder="{{ date('m') }}">
                    月
                    <input type="tel" id="contract_date_day" name="contract_date_day" value="{{ old('contract_date_day', $application->contract_date?$application->contract_date->format('d'):'') }}" class="form-control  @error('contract_date_day') is-invalid @enderror" placeholder="{{ date('d') }}">
                    日
                  </div>
                  */ ?>
                </td>
              </tr>
              <tr>
                <th>買取希望商品</th>
                <td>
                  <input type="text" class="form-control" name="contract_purchased_product" value="{{ old('contract_purchased_product', $application->contract_purchased_product) }}" class="form-control  @error('contract_purchased_product') is-invalid @enderror">
                </td>
              </tr>
              <tr>
                <th>商品数量</th>
                <td>

                  <div class="form-flex">
                    <input type="tel" class="form-control" name="contract_product_qty" value="{{ old('contract_product_qty', $application->contract_product_qty?:'') }}" class="form-control  @error('contract_product_qty') is-invalid @enderror">
                    <span>枚</span>
                  </div>
                </td>
              </tr>
              <tr>
                <th>商品の単価</th>
                <td>
                  <div class="form-flex">
                    <input type="tel" class="form-control" name="contract_purchased_amount" value="{{ old('contract_purchased_amount', $application->contract_purchased_amount?:'') }}" class="form-control  @error('contract_purchased_amount') is-invalid @enderror">
                    <span>円</span>
                  </div>
                </td>
              </tr>
              <tr>
                <th>売買代金の総額</th>
                <td>
                  <div class="form-flex">
                    <input type="tel" class="form-control" name="contract_product_price_total" value="{{ old('contract_product_price_total', $application->contract_product_price_total?:'') }}" class="form-control  @error('contract_product_price_total') is-invalid @enderror">
                    <span>円</span>
                  </div>
                </td>
              </tr>
              <tr>
                <th>買取方法</th>
                <td>
                  <input type="text" class="form-control" name="contract_purchase_method" value="{{ old('contract_purchase_method', $application->contract_purchase_method) }}" class="form-control  @error('contract_purchase_method') is-invalid @enderror">
                </td>
              </tr>
              <tr>
                <th>商品発送期限</th>
                <td>
                  ①代金先払いの場合：契約締結日より
                  <div class="form-flex mb-3">
                    <input type="tel" class="form-control" name="contract_payment_shipping_day" value="{{ old('contract_payment_shipping_day', $application->contract_payment_shipping_day) }}" class="form-control  @error('contract_payment_shipping_day') is-invalid @enderror">
                    <span>週間後の日必着にて発送</span>
                  </div>
                  ①代金後払いの場合：契約締結日より
                  <div class="form-flex">
                    <input type="tel" class="form-control" name="contract_deferred_payment_shipping_day" value="{{ old('contract_deferred_payment_shipping_day', $application->contract_deferred_payment_shipping_day) }}" class="form-control  @error('contract_deferred_payment_shipping_day') is-invalid @enderror">
                    <span>週間後の日必着にて発送</span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="form-action">

            <button type="submit" name="action" value="send" class="btn btn-primary">
              <span>保存する</span>
            </button>

            <a href="{{ route('admin.applications.pdf', $application ) }}" class="btn btn-primary">
              <i class="far fa-file-pdf"></i> PDF化
            </a>
            <a class="btn btn-danger btn-delete ml-1" data-message="{{ __('Are you sure you want to delete ') }}" data-form="#delete_{{ $application->id }}">
              <i class="fa fa-trash"></i> 削除
            </a>
          </div>
        </form>
        <form id="delete_{{$application->id}}" style="display:none" method="POST" action="{{route('admin.applications.destroy',['application'=>$application])}}">
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
    $("[name='status']").change(function() {
      const status = $(this).val();
      const id = $(this).data('id');
      $(this).prev('.status').removeAttr('class').addClass(`status status-${status} `);
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
  })
</script>
@endpush