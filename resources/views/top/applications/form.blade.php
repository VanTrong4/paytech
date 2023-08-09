@extends('layouts.master')

@section('title', '買取りフォーム | PayTech(ペイテック)')
@section('description', 'PayTech(ペイテック)の買取りフォームページになります。')
@section('page_name', '買取りフォーム')

@push('head')
<link rel="stylesheet" href="{{ asset('templates/frontend/css/form.css') }}">
@endpush

@section('content')
<section id="contact" class="page-section section ">
  <div class="wrap" style="margin-top: 16rem">

    <div class="box-title-run">
      <h1 class="title-box title-privacy fadein aos-init aos-animate" data-aos="show">買取りフォーム</h1>
    </div>


    <form id="applyForm" method="POST" action="{{ route(lp().'applications.form') }}" enctype="multipart/form-data">
      @csrf
      <div class="tab current">
        @include('applications.form_input')
      </div>
      <div class="tab ">
        @include('applications.form_confirm')
      </div>
      <div class="form-action">
        <button type="button" class="previous">戻る</button>
        <button type="button" class="next">入力内容の確認へ</button>
        <input type="submit" class="asd" value="送信する">
      </div>
      <div class="form-action">
        <p>

        </p>
      </div>
    </form>
  </div>
</section>
@endsection


@push('footer')
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<script src="//mozilla.github.io/pdf.js"></script>
<script src="{{ asset('templates/frontend/libs/jquery.jpostal.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/kana_text.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/jquery.validate.additional-methods.js') }}"></script>
<script src="{{ asset('templates/frontend/libs/multi-form.js') }}"></script>
<script src="{{ asset('templates/frontend/js/contact.js?v0307') }}"></script>
@endpush