<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CreatedApplicationMail;
use App\Mail\CreatedApplicationToAdminMail;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function showForm(Request $request)
  {
    $user = $request->user();
    $application = Application::whereUserId($user->id)->orderBy('created_at', 'DESC')->first();
    if (!$application)
      $application =  new Application();
    return view('applications.form', compact('user', 'application'));
  }

  public function register(Request $request)
  {
    $data = $request->only([
      'preferred_contact',
      'line_id',
      'zipcode1',
      'zipcode2',
      'prefect',
      'district',
      'address',
      'apartment_room',
      'phone_number',
      'company_zipcode1',
      'company_zipcode2',
      'company_prefect',
      'company_district',
      'company_address',
      'company_apartment_room',
      'company_phonenumber',
      'bank_name',
      'branch_name',
      'branch_number',
      'account_type',
      'account_number',
      'account_name_kana',
      'other'
    ]);
    $photo_fields = [
      'photo_wish_item',
      'photo_selfie',
      'photo_1',
      'photo_2',
      'photo_3',
      'photo_insurance_card',
      'photo_other'
    ];

    $user_id = $request->user()->getKey();
    $data['user_id']  = $user_id;

    $application = Application::create($data);
    $attachments = [];
    foreach ($photo_fields as $photo_file) :
      if ($request->hasFile($photo_file)) :
        $photo_file_name = $user_id . '_' . $application->id . '_' . date('Ymd_Hi') . '_' . $photo_file . '.' . $request->file($photo_file)->extension();
        $request->file($photo_file)->storeAs('public/profile', $photo_file_name);
        $attachments[$photo_file] = $photo_file_name;
      endif;
      $application->update($attachments);
    endforeach;

    $application->load('user');
    Mail::to($application->user->email)->send(new CreatedApplicationMail($application));
    Mail::to(config('admin.email'))->send(new CreatedApplicationToAdminMail($application));
    return redirect(route(lp() . 'applications.thanks'));
  }

  public function thanks()
  {
    return view('applications.thanks');
  }

  public function detail(Application $application)
  {
    if ($application->user_id != Auth::user()->id)
      abort(404);
    return view('applications.detail', compact('application'));
  }

  public function contract(Application $application)
  {
    if ($application->user_id != Auth::user()->id)
      abort(404);
    return view('applications.contract', compact('application'));
  }
  public function acceptContract(Application $application, Request $request)
  {
    if ($application->user_id != Auth::user()->id)
      abort(404);
    $data = $request->only([
      "contract_company_name",
      'contract_address',
      "contract_company_name_2",
      "contract_person"
    ]);
    $data['accept_at'] = Carbon::now();
    $data['status'] = 'waiting_for_payment';
    $application->update($data);

    return redirect(route(lp() . 'mypage'))->with('success', __("contract has been created"));;
  }
  public function pdf_print(Application $application)
  {
    if ($application->user_id != Auth::guard('web')->user()->id)
      abort(404);
    return view('applications.pdf_print', compact('application'));
  }
}
