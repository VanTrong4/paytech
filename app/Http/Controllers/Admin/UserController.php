<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Helper\XLSXWriterHelper;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use Carbon\Carbon;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $keyword = $request->input('keyword');
    $users = User::with('lastApplication')->orderBy('created_at', 'DESC')
      ->where(function ($query) use ($keyword) {
        if ($keyword) {
          return $query->where('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('furigana', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
      })
      ->paginate(100);
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function export()
  {

    $users = User::orderBy('created_at', 'DESC')->get();

    $filename = date('Y-m-d') . '__顧客管理一覧.xlsx';
    $file_path = storage_path('app/exports/' . $filename);

    $writer = new XLSXWriterHelper();
    $header = [
      '登録日' => 'string',
      '名前' => 'string',
      'フリガナ' => 'string',
      '生年月日'  =>  'string',
      '性別' => 'string',
      'メールアドレス' => 'string',
      'パスワード' => 'string',

    ];


    $writer->writeSheetHeader('顧客管理一覧', $header, ['fill' => "#375623", 'color' => '#fff', 'freeze_rows' => 1, 'font-style' => 'bold',  'widths' => [18, 25, 25, 18, 10, 40, 25]]);

    foreach ($users as $user) :
      $row = [];
      $row[] = $user->created_at->format('Y年m月d日');
      $row[] = $user->name;
      $row[] = $user->furigana;
      $row[] = $user->birthday->format('Y年m月d日');
      $row[] = $user->gender;
      $row[] = $user->email;
      $row[] = $user->hint;
      $writer->writeSheetRow('顧客管理一覧', $row,  array('valign' => 'top', 'wrap_text' => true));
    endforeach;

    $writer->writeToFile($file_path);

    if (file_exists($file_path)) {
      ob_end_clean(); // this is solution
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="' . XLSXWriterHelper::sanitize_filename($filename) . '"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file_path));
      readfile($file_path);
      unlink($file_path);
    }
    die;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateUserRequest $request)
  {
    $data = $request->only([
      'email',
      'name',
      'furigana',
      'year',
      'month',
      'day',
      'gender',
      'password',
    ]);

    $birthday = "{$data['year']}-{$data['month']}-{$data['day']}";
    $user = User::create([
      'email' => $data['email'],
      'name' => $data['name'],
      'furigana' => $data['furigana'],
      'birthday' => $birthday,
      'gender' => $data['gender'],
      'password' => Hash::make($data['password']),
      'hint' => $data['password'],
    ]);

    event(new Registered($user));
    return redirect()->route('admin.users.index')->with('success', __(":name has been created", ["name" =>  $user->name]));
  }
  public function edit(User $user)
  {
    return view('users.edit', compact('user'));
  }


  public function update(User $user, UpdateUserRequest $request)
  {
    $data = $request->only([
      'email',
      'name',
      'furigana',
      'year',
      'month',
      'day',
      'gender',
      'password'
    ]);

    $birthday = "{$data['year']}-{$data['month']}-{$data['day']}";
    $updateData = [
      'email' => $data['email'],
      'name' => $data['name'],
      'furigana' => $data['furigana'],
      'birthday' => $birthday,
      'gender' => $data['gender'],
      'password' => Hash::make($data['password']),
      'hint'  =>  $data['password']
    ];
    if ($request->has('verify')) :
      if (!$request->verify) {
        $updateData['email_verified_at'] = null;
      } elseif (!$user->email_verified_at) {
        $updateData['email_verified_at'] = Carbon::now();
      }
    endif;
    $user->update($updateData);

    return redirect()->route('admin.users.index')->with('success', __(":name has been updated", ["name" =>  $user->name]));
  }


  public function detail(User $user)
  {
    $user->load('applications');
    return view('users.detail', compact('user'));
  }
  public function note(User $user, Request $request)
  {
    $user->update($request->only(['note']));
    return redirect()->route('admin.users.detail', $user)->with('success', __("Note has been updated"));
  }
  public function destroy(User $user)
  {
    try {
      $name = $user->name;
      $user->delete();
      return redirect()->route('admin.users.index')->with('success', __("この顧客を削除しました。"));
    } catch (\Exception $e) {

      return redirect()->route('admin.users.index')->with('error', __("Can not delete user"));
    }
  }
}
