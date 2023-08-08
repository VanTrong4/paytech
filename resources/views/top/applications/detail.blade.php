@extends('layouts.master')
@section('title', '詳細ページ ｜即BUY(ソクバイ)')
@section('page_name', '詳細ページ ')
@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush

@section('content')
<section id="contact" class="contact section ">
  <div class="container">
    <div class="box-title-run">
      <h1 class="title-box title-privacy">詳細ページ</h1>
    </div>

    @if(in_array($application->status,['contract']))
    <div class="form-action">
      <a class="btn-back-home" href="{{ route(lp().'applications.contract', $application) }}">
        <span>契約する</span>
      </a>
    </div>
    @endif
    @if(in_array($application->status,['waiting_for_payment','complete']))
    <div class="form-action">
      <a class="btn-back-home btn-pdf-print" href="{{ route(lp().'applications.pdf_print', $application) }}">
        <span>契約書をダウンロード</span>
      </a>
    </div>
    @endif
    <div class="wrap">
      <div class="form-title">＜顧客情報＞</div>
      <table class="table table-apply">
        <tbody>
          <tr>
            <th class="info info-customer">お申込み日</th>
            <td class="application_at">{{ $application->created_at->format('Y年m月d日') }}</td>
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
        </tbody>
      </table>
      <div class="form-title">＜お住まいの情報＞</div>
      <table class="table table-apply">
        <tbody>
          <tr>
            <th class="info info-live">ご希望の連絡方法</th>
            <td class="preferred_contact">{{ $application->preferred_contact }}</td>
          </tr>
          <tr>
            <th class="info info-live">LINE ID</th>
            <td class="line_id">{{ $application->line_id }}</td>
          </tr>
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
      <div class="form-title">＜勤務先の情報＞</div>
      <table class="table table-apply">
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
      <div class="form-title">＜口座番号＞</div>
      <table class="table table-apply">
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
      <div class="form-title">＜必要書類の添付＞</div>
      <table class="table table-apply">
        <tbody>
          <tr>
            <th class="info info-account">買取希望商品</th>
            <td>
              @if($application->photo_wish_item)
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_wish_item) }}" alt="">
                <a href="{{ asset('storage/profile/'.$application->photo_wish_item) }}" download>
                  <i class="fas fa-download"></i>
                </a>
              </div>
              @endif
            </td>
          </tr>
          <tr>
            <th class="info info-account">セルフィー（自画撮り）</th>
            <td>
              @if($application->photo_selfie)
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_selfie) }}" alt="">
                <a href="{{ asset('storage/profile/'.$application->photo_selfie) }}" download>
                  <i class="fas fa-download"></i>
                </a>
              </div>
              @endif
            </td>
          </tr>
          <tr>
            <th class="info info-account">
              運転免許証、または<br>
              顔写真付きの身分証明書
            </th>
            <td>
              @if($application->photo_1)
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_1) }}" alt="">
              </div>
              @endif
              @if($application->photo_2)
              <p>※裏面</p>
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_2) }}" alt="">
              </div>
              @endif
              <br>
              @if($application->photo_3)
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_3) }}" alt="">
              </div>
              @endif
            </td>
          </tr>
          <tr>
            <th class="info info-account">
              保険証
            </th>
            <td>
              @if($application->photo_insurance_card)
              <div class="attachment">
                <img src="{{ asset('storage/profile/'.$application->photo_insurance_card) }}" alt="">
              </div>
              @endif
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

      <div class="form-action">
        <p>
          <a href="{{ route(lp().'mypage') }}" class="btn-back-home btn-back-mypage">マイページへ移動</a>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
@push('footer')

<script>
  $(document).ready(function() {
    $(".btn-pdf-print").click(function(e) {
      e.preventDefault();
      const id = $(this).data('id');
      $.ajax({
        url: `{{ route(lp().'applications.pdf_print', $application) }}`,
        type: 'POST',
        success: function(res) {
          var mywindow = window.open("", "");
          mywindow.document.write(res);;
          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10
          mywindow.print();
          mywindow.close();
          return true;
        }
      })
      return true;
    });

  })
</script>
@endpush