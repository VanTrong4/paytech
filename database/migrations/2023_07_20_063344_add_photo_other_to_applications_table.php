<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoOtherToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->string('photo_other')->nullable();
      $table->string('photo_other_1')->nullable();
      $table->string('photo_other_2')->nullable();
      $table->string('photo_other_3')->nullable();
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
      $table->dropColumn('photo_other');
      $table->dropColumn('photo_other_1');
      $table->dropColumn('photo_other_2');
      $table->dropColumn('photo_other_3');
    });
  }
}
