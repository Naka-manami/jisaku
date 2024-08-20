<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'user_id' => '1',
            'item_id' => '3',
            'count' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
