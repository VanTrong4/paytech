<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntiqueLedgersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('antique_ledgers', function (Blueprint $table) {
      $table->id();
      $table->date('date');
      $table->text('distinction');
      $table->string('traded_product_name');
      $table->string('traded_feature');
      $table->integer('traded_quantity');
      $table->integer('traded_price');
      $table->string('confirmation_method');
      $table->string('counterparty_address');
      $table->string('counterparty_name');
      $table->integer('counterparty_age');
      $table->string('counterparty_profession');
      $table->text('remarks');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('antique_ledgers');
  }
}
