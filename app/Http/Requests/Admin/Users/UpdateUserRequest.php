<?php

namespace App\Http\Requests\Admin\Users;

class UpdateUserRequest extends CreateUserRequest
{

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
      'email' => ['required', 'string', 'email',  'max:255', 'unique:users,email,' . $this->route('user')->id],
      'password' => ['required', 'alpha_num', 'min:8', 'confirmed'],
    ];
  }
}
