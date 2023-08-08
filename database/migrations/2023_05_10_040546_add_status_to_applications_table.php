<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('applications', function (Blueprint $table) {
      $table->enum('status', ['new', 'review', 'complete', 'refuse'])->default('new');
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
      $table->dropColumn('status');
    });
  }
}
