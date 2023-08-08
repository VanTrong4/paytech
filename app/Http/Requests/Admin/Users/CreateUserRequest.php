<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::guard('admin')->check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'furigana' => ['required', 'string', 'max:255'],
      'year' => ['required', 'numeric', 'min:1900', 'max:' . date('Y')],
      'month' => ['required', 'numeric', 'min:1', 'max:12'],
      'day' => ['required', 'numeric', 'min:1', 'max:31'],
      'gender' => ['required'],
      'email' => ['required', 'string', 'email',  'max:255', 'unique:users', 'confirmed'],
      'password' => ['required', 'alpha_num', 'min:8', 'confirmed'],
    ];
  }
  public function messages()
  {
    return
      [
        'name'  =>  '※名前を入力してください',
        'furigana'  =>  '※フリガナを入力してください',
        'gender'  =>  '※性別を入力してください',
        "email.required" =>  "※メールアドレスが入力されていません",
        "email.email" =>  "※メールアドレスの形式でご入力ください",
        "email.confirmed" =>  "※メールアドレスが一致しません",
        "password.required"  =>  "※パスワードが入力されていません",
        "password.min"  =>  "※文字以上入力してください",
        "password.malpha_numin"  =>  "※半角数字、英語で入力してください",
        "password.confirmed"  =>  "※登録パスワードが一致しません",
      ];
  }
}
