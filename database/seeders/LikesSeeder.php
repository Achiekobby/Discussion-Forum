<?php

namespace Database\Seeders;
use App\Models\Like;

use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
            ['reply_id'=>2, 'user_id'=>2],
            ['reply_id'=>2, 'user_id'=>1],
        ];
        Like::insert($likes);
    }
}
