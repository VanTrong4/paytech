<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeContractFieldsToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->integer('contract_product_qty')->nullable();
      $table->integer('contract_product_price_total')->nullable();
      $table->string('contract_purchase_method')->nullable();
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
      $table->dropColumn('contract_product_qty');
      $table->dropColumn('contract_product_price_total');
      $table->dropColumn('contract_purchase_method');
    });
  }
}
