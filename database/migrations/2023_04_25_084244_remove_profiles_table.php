<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProfilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::dropIfExists('profiles');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->string('preferred_contact')->nullable();
      $table->string('line_id')->nullable();
      $table->string('zipcode1')->nullable();
      $table->string('zipcode2')->nullable();
      $table->string('prefect')->nullable();
      $table->string('district')->nullable();
      $table->string('address')->nullable();
      $table->string('apartment_room')->nullable();
      $table->string('company_zipcode1')->nullable();
      $table->string('company_zipcode2')->nullable();
      $table->string('company_prefect')->nullable();
      $table->string('company_district')->nullable();
      $table->string('company_address')->nullable();
      $table->string('company_apartment_room')->nullable();
      $table->string('company_phonenumber')->nullable();
      $table->string('bank_name')->nullable();
      $table->string('branch_name')->nullable();
      $table->string('branch_number')->nullable();
      $table->string('account_type')->nullable();
      $table->string('account_number')->nullable();
      $table->string('account_name_kana')->nullable();
      $table->string('photo_selfie')->nullable();
      $table->string('photo_1')->nullable();
      $table->string('photo_2')->nullable();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
    });
  }
}
