<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('applications', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->string('address')->nullable();
      $table->string('phonenumber')->nullable();
      $table->string('email')->nullable();
      $table->string('company')->nullable();
      $table->string('fullname')->nullable();
      $table->string('amount')->nullable();
      $table->string('format')->nullable();
      $table->string('company_office')->nullable();
      $table->string('company_address')->nullable();
      $table->string('company_other')->nullable();
      $table->string('company_phone_my')->nullable();
      $table->string('photo_id_1')->nullable();
      $table->string('photo_id_2')->nullable();
      $table->string('photo_bill')->nullable();
      $table->string('photo_item')->nullable();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('applications');
  }
}
