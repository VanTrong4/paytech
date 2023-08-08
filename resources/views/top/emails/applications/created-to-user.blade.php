この度は弊社ホームページへ、買取りのお申し込みいただき<br>
誠にありがとうございました。<br>
フォームより以下の内容でお申し込みを承りました。<br>
<br>
━━━　送信内容　━━━<br>
<br>
<br>
名前: {{ $application->user->name }}<br>
フリガナ: {{ $application->user->furigana }}<br>
生年月日: {{ $application->user->birthday->format('Y年m月d日') }}<br>
性別: {{ $application->user->gender }}<br>
メールアドレス: {{ $application->user->email }}<br>
ご希望の連絡方法: {{ $application->preferred_contact }}<br>
LINE ID: {{ $application->line_id }}<br>
<br>
＜お住まいの情報＞<br>
郵便番号: 〒{{ $application->zipcode1 }}-{{ $application->zipcode2 }}<br>
都道府県: {{ $application->prefect }}<br>
市区町村: {{ $application->district }}<br>
番地: {{ $application->address }}<br>
マンション名・部屋番号: {{ $application->apartment_room }}<br>
連絡先(電話番号): {{ $application->phone_number }}<br>
<br>
＜勤務先の情報＞<br>
郵便番号: {{ $application->company_zipcode }}<br>
都道府県: {{ $application->company_prefect }}<br>
市区町村: {{ $application->company_district }}<br>
番地: {{ $application->company_address }}<br>
マンション名・部屋番号: {{ $application->company_apartment_room }}<br>
電話番号: {{ $application->company_phonenumber }}<br>
<br>
<br>
＜口座番号＞<br>
銀行名: {{ $application->bank_name }}<br>
支店名: {{ $application->branch_name }}<br>
支店番号: {{ $application->branch_number }}<br>
口座の種類: {{ $application->account_type }}<br>
口座番号: {{ $application->account_number }}<br>
口座名義(カナ): {{ $application->account_name_kana }}<br>
<br>
＜個人情報の写真添付＞<br>
必要書類の添付-その他: {{ $application->other }}<br>
<br>
━━━━━━━━━━━━<br>
※本メールはサーバーからの自動返信メールとなっております。<br>
本メールに返信いただいてもご連絡いたしかねますのでご了承ください。<br>
<br>