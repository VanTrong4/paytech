<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeadlineToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->dropColumn('contract_deadline');
    });
    Schema::table('applications', function (Blueprint $table) {
      $table->integer('contract_payment_shipping_day')->nullable();
      $table->integer('contract_deferred_payment_shipping_day')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->dropColumn('contract_payment_shipping_day');
      $table->dropColumn('contract_deferred_payment_shipping_day');
    });
    Schema::table('applications', function (Blueprint $table) {
      $table->date('contract_deadline')->nullable();
    });
  }
}
