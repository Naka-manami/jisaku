<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class BuyhistorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buyhistorys')->insert([
            'user_id' => '1',
            'item_id' => '1',
            'count' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
