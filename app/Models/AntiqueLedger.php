<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntiqueLedger extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'date',
    'distinction',
    'traded_product_name',
    'traded_feature',
    'traded_quantity',
    'traded_price',
    'confirmation_method',
    'counterparty_address',
    'counterparty_name',
    'counterparty_age',
    'counterparty_profession',
    'remarks',
  ];
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'date' => 'date',
  ];
}
