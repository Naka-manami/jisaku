<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;


class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'item_name' => 'ブラウス',
            'price' => '5000',
            'image' => 'blouse',
            'detail' => 'レーヨン素材',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('items')->insert([
            'item_name' => 'Tシャツ',
            'price' => '3000',
            'image' => 'Tshirt',
            'detail' => 'Uネック半袖',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
