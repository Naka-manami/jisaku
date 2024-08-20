<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => '1',
            'item_id' => '1',
            'title' => '良かった',
            'content' => 'とても着やすかったです。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
