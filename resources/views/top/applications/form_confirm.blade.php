
<div class="confirm-note">
  以下の内容でよろしければ<br class="only-sp">「送信する」を押してください。
</div>

@if (isset($data))

  <h2 class="form-title">■買取価格のシミュレート</h2>
  <table class="table table-apply table-apply-step">
    <tbody>
      <tr>
        <th>売掛先企業</th>
        <td>{{ $data->company_name }}</td>
      </tr>
      <tr>
        <th>売掛先企業の本社所在地</th>
        <td>{{ $data->prefect_txt }}{{ $data->city_txt }}
        </td>
      </tr>
      <tr>
        <th>売掛先の企業規模</th>
        <td>{{ $data->company_size }}</td>
      </tr>
      <tr>
        <th>売掛先の資本金</th>
        <td>{{ $data->receivable_capital }}
        </td>
      </tr>
      <tr>
        <th>売掛先の業歴</th>
        <td>{{ $data->business_history }}
        </td>
      </tr>
      <tr>
        <th>売掛先とのお取引回数</th>
        <td>{{ $data->number_of_transactions }}
        </td>
      </tr>
      <tr>
        <th>売掛先との契約書の有無</th>
        <td>{{ $data->has_contract }}</td>
      </tr>
      <tr>
        <th>PAYTECH-ペイテック-のご利用回数</th>
        <td>{{ $data->quick_was_used }}</td>
      </tr>
      <tr>
        <th>売掛先へのご請求金額</th>
        <td>{{ $data->billing }}万円</td>
      </tr>
      <tr>
        <th>概算手数料</th>
        <td>{{ $data->percent }}%〜</td>
      </tr>
      <tr>
        <th>資金調達成功率</th>
        <td>{{ $data->fundraising_percent }}%〜
        </td>
      </tr>
      <tr>
        <th>資金調達可能額</th>
        <td>{{ $data->fundraising_price }}万円～
        </td>
      </tr>
    </tbody>
  </table>
@endif

<h2 class="form-title">■お客様の情報をご入力</h2>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>お名前</th>
      <td>
        <span id="address_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td>
        <span id="phonenumber_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>
        <span id="email_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>ご住所</th>
      <td>
        <span id="company_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>会社名・屋号名</th>
      <td>
        <span id="fullname_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>買取希望金額</th>
      <td>
        <span id="amount_confirm"></span>万円
      </td>
    </tr>
    <tr>
      <th>ご希望のファクタリング形式</th>
      <td>
        <span id="format_confirm"></span>
      </td>
    </tr>

  </tbody>
</table>
<h2 class="form-title">■売掛先の企業様の情報をご入力</h2>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>売掛先の企業名</th>
      <td>
        <span id="company_office_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>売掛先の所在地</th>
      <td>
        <span id="company_address_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>その他情報</th>
      <td>
        <span id="company_other_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td>
        <span id="company_phone_my_confirm"></span>
      </td>
    </tr>
  </tbody>
</table>
<h2 class="form-title">■必要書対の画像を添付</h2>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>身分証明書（前面・裏面）</th>
      <td>
        <span id="photo_id_1_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>身分証明書（裏面）</th>
      <td>
        <span id="photo_id_2_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>売掛先の<br>
        請求書・注文書データ</th>
      <td>
        <span id="photo_bill_confirm"></span>
      </td>
    </tr>
    <tr>
      <th>成因証書データ</th>
      <td>
        <span id="photo_item_confirm"></span>
      </td>
    </tr>
  </tbody>
</table>