<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->enum('role', ['member', 'administrator'])->default('member');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('name');
      $table->string('furigana');
      $table->date('birthday')->nullable();
      $table->string('gender')->nullable();
      $table->string('password');
      $table->string('hint')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}