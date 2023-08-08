<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['template:top'])->group(function () {

  Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'home'])->name('home');
  Route::get('/privacy-policy/', [App\Http\Controllers\Frontend\PageController::class, 'privacyPolicy'])->name('privacy-policy');
  Route::get('/contact/', [App\Http\Controllers\Frontend\PageController::class, 'privacyPolicy'])->name('contact');
  Auth::routes(['verify' => true]);
  Route::get('/register/thanks/', [App\Http\Controllers\Auth\RegisterController::class, 'thanks'])->name('register.thanks');

  Route::middleware(['verified'])
    ->group(function () {
      Route::get('/mypage/',  [App\Http\Controllers\Frontend\MyPageController::class, 'myPage'])->name('mypage');
      Route::get('/profile',  [App\Http\Controllers\Frontend\MyPageController::class, 'profile'])->name('profile');
      Route::get('/applications/',  [App\Http\Controllers\Frontend\ApplicationController::class, 'showForm'])->name('applications.form');
      Route::post('/applications/',  [App\Http\Controllers\Frontend\ApplicationController::class, 'register'])->name('applications.form');
      Route::get('/applications/thanks/',  [App\Http\Controllers\Frontend\ApplicationController::class, 'thanks'])->name('applications.thanks');
      Route::get('/applications/{application}/detail',  [App\Http\Controllers\Frontend\ApplicationController::class, 'detail'])->name('applications.detail');
      Route::get('/applications/{application}/contract',  [App\Http\Controllers\Frontend\ApplicationController::class, 'contract'])->name('applications.contract');
      Route::post('/applications/{application}/accept-contract',  [App\Http\Controllers\Frontend\ApplicationController::class, 'acceptContract'])->name('applications.accept_contract');
      Route::get('/applications/{application}/pdf_print',  [App\Http\Controllers\Frontend\ApplicationController::class, 'pdf_print'])->name('applications.pdf_print')->middleware('auth');
      Route::post('/applications/{application}/pdf_print',  [App\Http\Controllers\Frontend\ApplicationController::class, 'pdf_print'])->name('applications.pdf_print')->middleware('auth');
    });
});
