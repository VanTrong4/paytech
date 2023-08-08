<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatedApplicationToAdminMail extends Mailable
{
  use /* Queueable, */ SerializesModels;


  protected $application;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(Application $application)
  {
    $site_name = config('app.site_name');
    $subject = "【{$site_name}】ホームページより買取りのお申し込みがありました";
    if ($application->prefix) {
      $prefix = strtoupper($application->prefix);
      $subject = "{$subject}({$prefix})";
    }
    $this->application  = $application;
    $this->subject = $subject;
    $this->markdown = "emails.applications.created-to-admin";
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $builder =   $this->with('application', $this->application);
    if ($this->application->photo_wish_item)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_wish_item);
    if ($this->application->photo_selfie)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_selfie);
    if ($this->application->photo_1)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_1);
    if ($this->application->photo_2)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_2);
    if ($this->application->photo_3)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_3);
    if ($this->application->photo_insurance_card)
      $builder->attachFromStorage('public/profile/' . $this->application->photo_insurance_card);
    return $builder;
  }
}
