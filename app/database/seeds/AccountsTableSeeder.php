<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'account' => 'taro',
            'mail' => 'taro@ne.jp',
            'password' => 'ta1234',
            'remember_token' => 'ta1234',
            'name' => 'tamada taro',
            'tel' => '08000000000',
            'post' => '6580000',
            'address' => '兵庫県神戸市灘区',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
