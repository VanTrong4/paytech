<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Notifications\Notifiable;

class Application extends Model
{
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'address',
    'user_id',
    'phonenumber',
    'email',
    'company',
    'fullname',
    'amount',
    'format',
    'company_office',
    'company_address',
    'company_other',
    'company_phone_my',
    'photo_id_1',
    'photo_id_2',
    'photo_bill',
    'photo_item',
    'other',
    'status',
    'contract_date',
    'contract_ad_code',
    'contract_purchased_product',
    'contract_product_qty',
    'contract_purchased_amount',
    'contract_product_price_total',
    'contract_payment_shipping_day',
    'contract_deferred_payment_shipping_day',
    'contract_penalty',
    'contract_purchase_method',
    "contract_id",
    "contract_company_name",
    'contract_address',
    "contract_company_name_2",
    "contract_person",
    "contract_created_at",
    "accept_at"
  ];
  protected $casts = [
    'contract_date' => 'date',
    'contract_created_at' => 'date',
    'accept_at' => 'date',
  ];
  protected static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
      $model->prefix = prefix();
    });
    static::created(function ($application) {
      $register_date = $application->created_at->format('Ymd');
      $auto_id =  str_pad($application->id, 5, '0', STR_PAD_LEFT);
      $application->member_id = "{$register_date}-{$auto_id}";
      $application->save();
    });
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  public function getZipcodeAttribute()
  {
    return "〒{$this->zipcode1}-{$this->zipcode2}";
  }
  public function getCompanyZipcodeAttribute()
  {
    if ($this->company_zipcode1 || $this->company_zipcode2)
      return "〒{$this->company_zipcode1}-{$this->company_zipcode2}";
    return "";
  }

  public function getContractDateInputAttribute()
  {
    return $this->contract_date ? $this->contract_date->format('Y-m-d') : '';
  }
  public function getContractDateFormatAttribute()
  {
    return $this->contract_date ? $this->contract_date->format('Y年m月d日') : '';
  }

  public function scopeOwner(Builder $query): void
  {
    $query->whereUserId(Auth::user()->id);
  }
}
