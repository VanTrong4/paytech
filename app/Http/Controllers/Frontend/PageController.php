<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
  public function home()
  {
    return view('pages.home');
  }

  public function privacyPolicy()
  {
    return view('pages.privacy-policy');
  }
}