<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>
        <label for="preferred_contact_1" class="ttl-group">
          <span class="required">必須</span>ご希望の連絡方法
        </label>
      </th>
      <td>
        <div class="form-group">
          <div class="group-radio">
            <label>
              <input type="radio" id="preferred_contact_1" name="preferred_contact" value="メール" required {{ old('preferred_contact', $application->preferred_contact)=="メール"?"checked":"" }}>
              メール
            </label>
            <label>
              <input type="radio" id="preferred_contact_2" name="preferred_contact" value="LINE" required {{ old('preferred_contact', $application->preferred_contact)=="LINE"?"checked":"" }}>
              LINE
            </label>
          </div>
          <span class="help-block show" role="alert">
            @error('preferred_contact')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="line_id" class="ttl-group">
          <span>任意</span>LINE ID
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" name="line_id" id="line_id" value="{{ old('line_id', $application->line_id) }}" class="form-control  @error('line_id') is-invalid @enderror" placeholder="※LINEのID検索をONに設定してください">
          <span class="help-block show" role="alert">
            @error('line_id')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
  </tbody>
</table>

<div class="form-title fadein" data-aos="show">＜お住まいの情報＞</div>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>
        <label for="zipcode1" class="ttl-group">
          <span class="required">必須</span>郵便番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <div class="gr-zip-code">
            〒<input type="tel" id="zipcode1" name="zipcode1" value="{{ old('zipcode1', $application->zipcode1) }}" placeholder="例：110" class="form-control" required="required">-
            <input type="tel" id="zipcode2" name="zipcode2" value="{{ old('zipcode2', $application->zipcode2) }}" placeholder="例：0005" aria-label="zipcode2" class="form-control" required="required">
          </div>
          <span class="help-block show" role="alert">
            @if($errors->get('zipcode1') || $errors->get('zipcode2'))
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="prefect" class="ttl-group">
          <span class="required">必須</span>都道府県
        </label>
      </th>
      <td>
        <div class="form-group">
          <select name="prefect" id="prefect" class="form-control">
            <option value="">都道府県を選択</option>
            @foreach(list_prefect() as $prefect)
            <option value="{{ $prefect }}" @if(old('prefect', $application->prefect)==$prefect) selected @endif>{{ $prefect }}</option>
            @endforeach
          </select>
          <span class="help-block show" role="alert">
            @error('prefect')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="district" class="ttl-group">
          <span class="required">必須</span>市区町村
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="district" name="district" value="{{ old('district', $application->district) }}" class="form-control  @error('district') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('district')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="address" class="ttl-group">
          <span class="required">必須</span>番地
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="address" name="address" value="{{ old('address', $application->address) }}" class="form-control  @error('address') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('address')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="apartment_room" class="ttl-group">
          <span>任意</span>マンション名・部屋番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="apartment_room" name="apartment_room" value="{{ old('apartment_room', $application->apartment_room) }}" class="form-control  @error('apartment_room') is-invalid @enderror">

          <span class="help-block show" role="alert">
            @error('apartment_room')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="phone_number" class="ttl-group">
          <span class="required">必須</span>連絡先(電話番号)
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number', $application->phone_number) }}" class="form-control  @error('phone_number') is-invalid @enderror">

          <span class="help-block show" role="alert">
            @error('phone_number')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<div class="form-title fadein" data-aos="show">＜勤務先の情報＞</div>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>
        <label for="company_zipcode1" class="ttl-group">
          <span>任意</span>郵便番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <div class="gr-zip-code">
            〒<input type="tel" id="company_zipcode1" name="company_zipcode1" value="{{ old('company_zipcode1', $application->company_zipcode1) }}" placeholder="例：110" class="form-control">-
            <input type="tel" id="company_zipcode2" name="company_zipcode2" value="{{ old('company_zipcode2', $application->company_zipcode2) }}" placeholder="例：0005" aria-label="company_zipcode2" class="form-control">
          </div>
          <span class="help-block show" role="alert">
            @if($errors->get('company_zipcode1') || $errors->get('company_zipcode2'))
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="company_prefect" class="ttl-group">
          <span>任意</span>都道府県
        </label>
      </th>
      <td>
        <div class="form-group">
          <select name="company_prefect" id="company_prefect" class="form-control">
            <option value="">都道府県を選択</option>
            @foreach(list_prefect() as $prefect)
            <option value="{{ $prefect }}" @if(old('company_prefect', $application->company_prefect)==$prefect) selected @endif>{{ $prefect }}</option>
            @endforeach
          </select>
          <span class="help-block show" role="alert">
            @error('company_prefect')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="company_district" class="ttl-group">
          <span>任意</span>市区町村
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="company_district" name="company_district" value="{{ old('company_district', $application->company_district) }}" class="form-control  @error('company_district') is-invalid @enderror">

          <span class="help-block show" role="alert">
            @error('company_district')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="company_address" class="ttl-group">
          <span>任意</span>番地
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="company_address" name="company_address" value="{{ old('company_address', $application->company_address) }}" class="form-control  @error('company_address') is-invalid @enderror">

          <span class="help-block show" role="alert">
            @error('company_address')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="company_apartment_room" class="ttl-group">
          <span>任意</span>マンション名・部屋番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="company_apartment_room" name="company_apartment_room" value="{{ old('company_apartment_room', $application->company_apartment_room) }}" class="form-control  @error('company_apartment_room') is-invalid @enderror">

          <span class="help-block show" role="alert">
            @error('company_apartment_room')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="company_phonenumber" class="ttl-group">
          <span>任意</span>電話番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="tel" id="company_phonenumber" name="company_phonenumber" value="{{ old('company_phonenumber', $application->company_phonenumber) }}" class="form-control  @error('company_phonenumber') is-invalid @enderror" placeholder="※0123456789（ハイフン無し）">

          <span class="help-block show" role="alert">
            @error('company_phonenumber')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
  </tbody>
</table>

<div class="form-title fadein" data-aos="show">＜口座番号＞</div>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>
        <label for="bank_name" class="ttl-group">
          <span class="required">必須</span>銀行名
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="bank_name" name="bank_name" value="{{ old('bank_name', $application->bank_name) }}" class="form-control  @error('bank_name') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('bank_name')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="branch_name" class="ttl-group">
          <span class="required">必須</span>支店名
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="branch_name" name="branch_name" value="{{ old('branch_name', $application->branch_name) }}" class="form-control  @error('branch_name') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('branch_name')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="branch_number" class="ttl-group">
          <span class="required">必須</span>支店番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="branch_number" name="branch_number" value="{{ old('branch_number', $application->branch_number) }}" class="form-control  @error('branch_number') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('branch_number')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="account_type" class="ttl-group">
          <span class="required">必須</span>口座の種類
        </label>
      </th>
      <td>
        <div class="form-group">
          <div class="group-radio">
            <label>
              <input type="radio" id="account_type_1" name="account_type" value="普通" required {{ old('account_type', $application->account_type)=="普通"?"checked":"" }}>
              普通
            </label>
            <label>
              <input type="radio" id="account_type_2" name="account_type" value="当座" required {{ old('account_type', $application->account_type)=="当座"?"checked":"" }}>
              当座
            </label>
          </div>
          <span class="help-block show" role="alert">
            @error('account_type')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="account_number" class="ttl-group">
          <span class="required">必須</span>口座番号
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="tel" id="account_number" name="account_number" value="{{ old('account_number', $application->account_number) }}" class="form-control  @error('account_number') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('account_number')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th>
        <label for="account_name_kana" class="ttl-group">
          <span class="required">必須</span>口座名義(カナ)
        </label>
      </th>
      <td>
        <div class="form-group">
          <input type="text" id="account_name_kana" name="account_name_kana" value="{{ old('account_name_kana', $application->account_name_kana) }}" class="form-control  @error('account_name_kana') is-invalid @enderror" required>

          <span class="help-block show" role="alert">
            @error('account_name_kana')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<div class="form-title fadein" data-aos="show">＜個人情報の写真添付＞</div>
<table class="table table-apply fadein" data-aos="show">
  <tbody>
    <tr>
      <th>
        <label for="bank_name" class="ttl-group">
          <span>任意</span>必要書類の添付
        </label>
      </th>
      <td>
        <ul class="form-group-file">
          <li class="file-wrap">
            <div class="label">買取希望商品</div>
            <div class="file-group">
              <div class="file-item">
                <span></span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_wish_item" name="photo_wish_item" accept="image/*">
                  </div>
                  <div class="preview" id="photo_wish_item_preview">
                  </div>
                  <span class="help-block @error('photo_wish_item') show @enderror" role="alert">
                    @error('photo_wish_item')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
          </li>
          <li class="file-wrap">
            <div class="label">セルフィー（自画撮り）</div>
            <div class="file-group">
              <div class="file-item">
                <span></span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_selfie" name="photo_selfie" accept="image/*">
                  </div>
                  <div class="preview" id="photo_selfie_preview">
                  </div>
                  <span class="help-block @error('photo_selfie') show @enderror" role="alert">
                    @error('photo_selfie')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
            <p class="note">※セルフィー(自画撮り)は身分証明書お手元にお持ちいただき、<br class="only-pc">ご自身が同時に写った写真をお送りください。</p>
          </li>
          <li class="file-wrap">
            <div class="label">運転免許証、または<br class="only-pc">顔写真付きの身分証明書</div>
            <div class="file-group">
              <div class="file-item">
                <span>※表面</span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_1" name="photo_1" accept="image/*">
                  </div>
                  <div class="preview" id="photo_1_preview">
                  </div>
                  <span class="help-block @error('photo_1') show @enderror" role="alert">
                    @error('photo_1')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
              <div class="file-item">
                <span>※裏面</span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                  </div>
                  <div class="preview" id="photo_2_preview">
                  </div>
                  <span class="help-block @error('photo_2') show @enderror" role="alert">
                    @error('photo_2')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
              <div class="file-item">
                <span></span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                  </div>
                  <p class="note">※斜めの角度から厚みが分かる写真</p>
                  <div class="preview" id="photo_3_preview">
                  </div>
                  <span class="help-block @error('photo_3') show @enderror" role="alert">
                    @error('photo_3')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
          </li>
          <li class="file-wrap">
            <div class="label">保険証</div>
            <div class="file-group">
              <div class="file-item">
                <span></span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_insurance_card" name="photo_insurance_card" accept="image/*">
                  </div>
                  <div class="preview" id="photo_insurance_card_preview">
                  </div>
                  <span class="help-block @error('photo_insurance_card') show @enderror" role="alert">
                    @error('photo_insurance_card')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
            <p class="note">
              ※添付可能な画像のファイル形式は<span>JPEG・PNG・GIF</span>となります。<br>
              ※添付ボタン1つにつき、<span>添付可能な画像容量は5MB</span>までになります。
            </p>
          </li>
          <li class="file-wrap">
            <div class="label">その他の画像</div>
            <div class="file-group">
              <div class="file-item">
                <span></span>
                <div class="form-group  file-control">
                  <div class="control">
                    <input type="file" id="photo_other" name="photo_other" accept="image/*">
                  </div>
                  <div class="preview" id="photo_other_preview">
                  </div>
                  <span class="help-block @error('photo_other') show @enderror" role="alert">
                    @error('photo_other')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
          </li>
          <li class="file-wrap">
            <div class="label">その他</div>
            <div class="file-group">
              <div class="file-item">
                <span></span>
                <div class="form-group file-control">
                  <textarea name="other" id="other" class="form-control  @error('other') is-invalid @enderror" cols="30" rows="10">{{ old('other', $application->other) }}</textarea>

                  <span class="help-block @error('other') show @enderror" role="alert">
                    @error('other')
                    <strong>{{ $message }}</strong>
                    @enderror
                  </span>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </td>
    </tr>
  </tbody>
</table>