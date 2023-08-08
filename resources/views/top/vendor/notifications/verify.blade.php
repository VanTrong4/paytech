@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
ご登録誠にありがとうございます
@endcomponent
@endslot

{{-- Intro Lines --}}
@foreach ($introLines as $line)
<p>{!! $line !!}</p>
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
  case 'success':
  case 'error':
    $color = $level;
    break;
  default:
    $color = 'primary';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<p>{!! $line !!}</p>
@endforeach

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"「:actionText」ボタンをクリックできない場合は、以下のURLをコピーしてウェブブラウザに直接貼り付けてください。",
[
'actionText' => $actionText,
]
) <p><span class="break-all">{{ $actionUrl }}</span></p>
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent