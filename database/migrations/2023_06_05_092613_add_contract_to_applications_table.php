<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->string("contract_id")->nullable();
      $table->string("contract_company_name")->nullable();
      $table->string('contract_address')->nullable();
      $table->string("contract_company_name_2")->nullable();
      $table->string("contract_person")->nullable();
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
      $table->dropColumn("contract_id");
      $table->dropColumn("contract_company_name");
      $table->dropColumn('contract_address');
      $table->dropColumn("contract_company_name_2");
      $table->dropColumn("contract_person");
    });
  }
}
