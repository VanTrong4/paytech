<?php

namespace App\Mail;

use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Auth\Notifications\VerifyEmail;

class CustomVerifyEmailNoLine extends VerifyEmail
{
  protected function buildMailMessage($url)
  {
    return (new MailMessage)
      ->template('notifications::verify')
      ->subject("［即BUY(ソクバイ)］会員登録のお知らせ")
      ->line(nl2br("この度は、当店「即BUY(ソクバイ)」の会員にご登録いただき
      誠にありがとうございます。
      このメールは、ご登録時に確認のため
      送信させていただいております。"))
      ->action("承認後 ログイン画面を表示", $url)
      ->line(nl2br("こちらのボタンを押すと正式に会員承認され
      ログイン画面が表示されます。
      
      ログイン画面表示後
      登録したメールアドレスとパスワードを入力しお進みください。
      ログイン後、お申し込みフォームが表示されます。
      ----------------------------------------------------
      ※登録されたメールアドレスおよびパスワードは、
      お申し込みフォームににログインする際に必要となります。
      忘れず保管をお願いいたします。
      ----------------------------------------------------"));
  }
}
