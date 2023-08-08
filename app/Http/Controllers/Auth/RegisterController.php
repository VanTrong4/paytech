<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email',  'max:255', 'unique:users', 'confirmed'],
      'password' => ['required', 'alpha_num', 'min:8', 'confirmed'],
      'accept'  => ['required'],
    ], [
      'name'  =>  '※名前を入力してください',
      'furigana'  =>  '※フリガナを入力してください',
      'gender'  =>  '※性別を入力してください',
      "email.required" =>  "※メールアドレスが入力されていません",
      "email.email" =>  "※メールアドレスの形式でご入力ください",
      "email.confirmed" =>  "※メールアドレスが一致しません",
      "password.required"  =>  "※パスワードが入力されていません",
      "password.min"  =>  "※8文字以上入力してください",
      "password.malpha_numin"  =>  "※半角数字、英語で入力してください",
      "password.confirmed"  =>  "※登録パスワードが一致しません",
      "accept"  =>  "※プライバシーポリシーについてに同意するをチェックしてください。",
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {
    return User::create([
      'email' => $data['email'],
      'name' => $data['name'],
      'password' => Hash::make($data['password']),
      'hint'  =>  $data['password']
    ]);
  }

  /**
   * Handle a registration request for the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
   */
  public function register(Request $request)
  {
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));


    if ($response = $this->registered($request, $user)) {
      return $response;
    }

    return $request->wantsJson()
      ? new JsonResponse([], 201)
      : redirect($this->redirectPath());
  }

  public function redirectTo()
  {
    return route(lp() . 'register.thanks');
  }

  public function thanks()
  {
    return view('auth.register-thanks');
  }
}