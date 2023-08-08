<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

use Exception;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    try {
      Admin::create([
        'email' =>  'admin@s-buy.net',
        'name'  =>  'Admin',
        'password'  =>  Hash::make("kFHShBLdCC"),
      ]);
    } catch (Exception $e) {
      echo "\033[31mAdmin account has been created!\033[0m\n";
    }
  }
}
