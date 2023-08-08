<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormFieldsToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->string('phone_number')->nullable()->after('apartment_room');
      $table->string('photo_wish_item')->nullable()->after('account_name_kana');
      $table->string('photo_3')->nullable()->after('photo_2');
      $table->string('photo_insurance_card')->nullable()->after('photo_3');
      $table->text('other')->nullable()->after('photo_insurance_card');
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
      $table->dropColumn('phone_number');
      $table->dropColumn('photo_wish_item');
      $table->dropColumn('photo_3');
      $table->dropColumn('photo_insurance_card');
      $table->dropColumn('other');
    });
  }
}
