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





Route::namespace('Admin')
  ->middleware(['template:admin'])
  ->group(function ($route) {
    $route->get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    $route->post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');

    Route::middleware(['auth:admin'])
      ->group(function ($route) {


        $route->get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('dashboard');

        $route->post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

        $route->get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        $route->post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');

        $route->get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        $route->get('/users/export', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('users.export');
        $route->get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        $route->put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        $route->delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        $route->get('/users/{user}/detail', [App\Http\Controllers\Admin\UserController::class, 'detail'])->name('users.detail');
        $route->put('/users/{user}/note', [App\Http\Controllers\Admin\UserController::class, 'note'])->name('users.note');

        $route->get('/applications', [App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('applications.index');
        $route->get('/applications/create', [App\Http\Controllers\Admin\ApplicationController::class, 'create'])->name('applications.create');
        $route->get('/applications/export', [App\Http\Controllers\Admin\ApplicationController::class, 'export'])->name('applications.export');

        $route->put('/applications/update_status', [App\Http\Controllers\Admin\ApplicationController::class, 'update_status'])->name('applications.update_status');

        $route->get('/applications/{application}/pdf', [App\Http\Controllers\Admin\ApplicationController::class, 'pdf'])->name('applications.pdf');
        $route->get('/applications/{application}/pdf_print', [App\Http\Controllers\Admin\ApplicationController::class, 'pdfPrint'])->name('applications.pdf_print');
        $route->post('/applications/{application}/contract', [App\Http\Controllers\Admin\ApplicationController::class, 'updateContract'])->name('applications.contract');
        $route->post('/applications/{application}/printer', [App\Http\Controllers\Admin\ApplicationController::class, 'printer'])->name('applications.printer');
        $route->get('/applications/{application}', [App\Http\Controllers\Admin\ApplicationController::class, 'edit'])->name('applications.edit');
        $route->put('/applications/{application}', [App\Http\Controllers\Admin\ApplicationController::class, 'update'])->name('applications.update');
        $route->delete('/applications/{application}', [App\Http\Controllers\Admin\ApplicationController::class, 'destroy'])->name('applications.destroy');
        $route->get('/applications/{userId}/member', [App\Http\Controllers\Admin\ApplicationController::class, 'byUserId'])->name('applications.byUserId');

        $route->get('/master_ads', [App\Http\Controllers\Admin\MasterAdController::class, 'index'])->name('master_ads.index');
        $route->post('/master_ads', [App\Http\Controllers\Admin\MasterAdController::class, 'store'])->name('master_ads.store');
        $route->get('/master_ads/create', [App\Http\Controllers\Admin\MasterAdController::class, 'create'])->name('master_ads.create');
        $route->get('/master_ads/{masterAd}', [App\Http\Controllers\Admin\MasterAdController::class, 'edit'])->name('master_ads.edit');
        $route->put('/master_ads/{masterAd}', [App\Http\Controllers\Admin\MasterAdController::class, 'update'])->name('master_ads.update');
        $route->delete('/master_ads/{masterAd}', [App\Http\Controllers\Admin\MasterAdController::class, 'destroy'])->name('master_ads.destroy');

        $route->get('/antique_ledgers', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'index'])->name('antique_ledgers.index');
        $route->post('/antique_ledgers', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'store'])->name('antique_ledgers.store');
        $route->get('/antique_ledgers/create', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'create'])->name('antique_ledgers.create');
        $route->get('/antique_ledgers/{antiqueLedger}', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'edit'])->name('antique_ledgers.edit');
        $route->put('/antique_ledgers/{antiqueLedger}', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'update'])->name('antique_ledgers.update');
        $route->delete('/antique_ledgers/{antiqueLedger}', [App\Http\Controllers\Admin\AntiqueLedgerController::class, 'destroy'])->name('antique_ledgers.destroy');
      });
  });
