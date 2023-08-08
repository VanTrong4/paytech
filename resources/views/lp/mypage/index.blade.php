@extends('layouts.master')

@section('title', 'マイページ |即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)のマイページページになります。当社の個人情報保護方針、個人情報の取り扱いについてご案内します。')
@section('page_name', 'マイページ')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
<link href="{{ asset('templates/frontend/css/mypage.css') }}" rel="stylesheet">
@endpush

@section('content')

<main class="page-section">
  <section class="wrap">
    <div class="container">

      <div class="box-title-run">
        <h1 class="title-box title-privacy fadein" data-aos="show">マイページ</h1>
      </div>

      <div id="mypage">
        @include('mypage.tabs')
        <div class="list-wrap">
          <h2 class="list-title">お申し込み一覧</h2>
          <div class="list-content">
            @if(!$news->isEmpty())
            <table>
              @include('mypage.table-head')
              <tbody>
                @foreach($news as $application)
                <tr>
                  <td class="status">
                    お申込み日
                    <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                    <span class="badge application-status application-status-{{ $application->status }}">{{ application_status_customer($application->status) }}</span>
                    <a class="badge detail" href="{{ route(lp().'applications.detail', $application) }}">詳細ページ　≫</a>
                  </td>
                  <td>
                    {{ $application->zipcode }}<br>
                    {{ $application->prefect }}{{ $application->district }}{{ $application->address }}<br>
                    {{ $application->apartment_room }}
                  </td>
                  <td>
                    {{ $application->company_zipcode }}<br>
                    {{ $application->company_prefect }}{{ $application->company_district }}{{ $application->company_address }}<br>
                    {{ $application->company_apartment_room }}
                  </td>
                  <td>
                    銀行名: {{ $application->bank_name }}<br>
                    支店名: {{ $application->branch_name }}<br>
                    支店番号: {{ $application->branch_number }}<br>
                    口座の種類: {{ $application->account_type }}<br>
                    口座番号: {{ $application->account_number }}<br>
                    口座名義(カナ): {{ $application->account_name_kana }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-content">※現在、お申し込みは0件になります。</div>
            @endif
          </div>
        </div>
        <div class="list-wrap">
          <h2 class="list-title">契約確認中</h2>
          <div class="list-content">
            @if(!$contracts->isEmpty())
            <table>
              @include('mypage.table-head')
              <tbody>
                @foreach($contracts as $application)
                <tr>
                  <td class="status">
                    お申込み日
                    <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                    <span class="badge application-status application-status-{{ $application->status }}">{{ application_status_customer($application->status) }}</span>
                    <a class="badge detail" href="{{ route(lp().'applications.detail', $application) }}">詳細ページ　≫</a>
                  </td>
                  <td>
                    {{ $application->zipcode }}<br>
                    {{ $application->prefect }}{{ $application->district }}{{ $application->address }}<br>
                    {{ $application->apartment_room }}
                    <hr>
                    <p style="font-size: 0.8em;">
                      ①代金先払いの場合：<br> 契約締結日より{{ $application->contract_payment_shipping_day?:"......" }}週間後の日必着にて発送<br>
                      ①代金後払いの場合：<br> 契約締結日より{{ $application->contract_deferred_payment_shipping_day?:"......" }}週間後の日必着にて発送
                    </p>
                  </td>
                  <td>
                    {{ $application->company_zipcode }}<br>
                    {{ $application->company_prefect }}{{ $application->company_district }}{{ $application->company_address }}<br>
                    {{ $application->company_apartment_room }}
                  </td>
                  <td>
                    銀行名: {{ $application->bank_name }}<br>
                    支店名: {{ $application->branch_name }}<br>
                    支店番号: {{ $application->branch_number }}<br>
                    口座の種類: {{ $application->account_type }}<br>
                    口座番号: {{ $application->account_number }}<br>
                    口座名義(カナ): {{ $application->account_name_kana }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-content">※現在、「契約確認中」のお申し込みは0件になります。</div>
            @endif
          </div>
        </div>
        <div class="list-wrap">
          <h2 class="list-title">契約後</h2>
          <div class="list-content">
            @if(!$after_contracts->isEmpty())
            <table>
              @include('mypage.table-head')
              <tbody>
                @foreach($after_contracts as $application)
                <tr>
                  <td class="status">
                    お申込み日
                    <span>{{ $application->created_at->format('Y年m月d日') }}</span>
                    <span class="badge application-status application-status-{{ $application->status }}">{{ application_status_customer($application->status) }}</span>
                    <a class="badge detail" href="{{ route(lp().'applications.detail', $application) }}">詳細ページ　≫</a>
                  </td>
                  <td>
                    {{ $application->zipcode }}<br>
                    {{ $application->prefect }}{{ $application->district }}{{ $application->address }}<br>
                    {{ $application->apartment_room }}
                    <hr>
                    <p style="font-size: 0.8em;">
                      ①代金先払いの場合：<br> 契約締結日より{{ $application->contract_payment_shipping_day?:"......" }}週間後の日必着にて発送<br>
                      ①代金後払いの場合：<br> 契約締結日より{{ $application->contract_deferred_payment_shipping_day?:"......" }}週間後の日必着にて発送
                    </p>
                  </td>
                  <td>
                    {{ $application->company_zipcode }}<br>
                    {{ $application->company_prefect }}{{ $application->company_district }}{{ $application->company_address }}<br>
                    {{ $application->company_apartment_room }}
                  </td>
                  <td>
                    銀行名: {{ $application->bank_name }}<br>
                    支店名: {{ $application->branch_name }}<br>
                    支店番号: {{ $application->branch_number }}<br>
                    口座の種類: {{ $application->account_type }}<br>
                    口座番号: {{ $application->account_number }}<br>
                    口座名義(カナ): {{ $application->account_name_kana }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-content">※現在、「契約後」のお申し込みは0件になります。</div>
            @endif
          </div>
        </div>

        <p class="form-action">
          <a class="btn-back-home" href="{{ route(lp().'home') }}">TOPへ戻る</a>
        </p>
      </div>

    </div>
    </div>
  </section>
</main>
@endsection