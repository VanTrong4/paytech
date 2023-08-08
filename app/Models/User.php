<?php

namespace App\Models;

use App\Mail\CustomVerifyEmail;
use App\Mail\CustomVerifyEmailNoLine;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'prefix',
    'email',
    'email_verified_at',
    'name',
    'furigana',
    'birthday',
    'gender',
    'password',
    'hint',
    'note',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'birthday' => 'date'
  ];
  protected static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
      $model->prefix = prefix();
    });
    static::deleting(function ($user) {
      $user->applications()->delete();
    });
  }
  public function applications()
  {
    return $this->hasMany('App\Models\Application')->orderBy('created_at', 'DESC');
  }

  public function lastApplication()
  {
    return $this->hasOne('App\Models\Application')->orderBy('created_at', 'DESC');
  }
  /**
   * Custom send VerifyEmail
   */
  public function sendEmailVerificationNotification()
  {
    $this->notify(new CustomVerifyEmail);
    /* 
    switch ($this->prefix) {
      case "lp":
        $this->notify(new CustomVerifyEmailNoLine);
        break;
      default:
        $this->notify(new CustomVerifyEmail);
        break;
    } */
  }
}
