<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
  public function myPage()
  {
    $news = Application::owner()->whereIn('status', ['new', 'review'])->get();
    $contracts = Application::owner()->whereIn('status', ['contract'])->get();
    $after_contracts = Application::owner()->whereIn('status', ['waiting_for_payment', 'complete', 'refuse', 'payment', 'unshipped'])->paginate(10);
    return view('mypage.index', compact('news', 'contracts', 'after_contracts'));
  }
  public function profile()
  {
    $user = Auth::user();
    return view('mypage.profile', compact('user'));
  }
}
