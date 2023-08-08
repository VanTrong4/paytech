@extends('layouts.master')
@section('title', 'お申し込み情報の契約書ページ｜即BUY(ソクバイ)')
@section('description', '即BUY(ソクバイ)のお申し込みの契約書ページになります。')
@section('page_name', 'お申し込み情報の契約書ページ')
@push('head')

<link rel="stylesheet" href="{{ asset('templates/frontend/css/contract.css') }}">
@endpush
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid bg-print ">
    <form action="{{ route(lp().'applications.accept_contract', $application) }}" method="post">
      <div id="print-content">


        @include('applications._print_content_before')
        <p>
          氏名: <input type="text" name="contract_person" value="{{ old('contract_person', $application->contract_person) }}" style="width:300px">
        </p>
        @include('applications._print_content_after')

      </div>
      <div class="contract-action text-center mt-5">
        @csrf
        <button class="btn btn-back-home btn-pdf-print">契約書を同意する</button>
      </div>
      <div class="form-action text-center" style="text-align: center; margin-top: 3rem;">
        <p>
          <a href="{{ route(lp().'mypage') }}" class="btn-back-home">マイページへ移動</a>
        </p>
      </div>
    </form>
  </div>
</section>
@endsection