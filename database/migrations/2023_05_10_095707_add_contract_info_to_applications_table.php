<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractInfoToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->date('contract_date')->nullable();
      $table->text('contract_purchased_product')->nullable();
      $table->integer('contract_purchased_amount')->nullable();
      $table->date('contract_deadline')->nullable();
      $table->integer('contract_penalty')->nullable();
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
      $table->dropColumn('contract_date');
      $table->dropColumn('contract_purchased_product');
      $table->dropColumn('contract_purchased_amount');
      $table->dropColumn('contract_deadline');
      $table->dropColumn('contract_penalty');
    });
  }
}
