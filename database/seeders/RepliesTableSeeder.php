<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replies = [
            ['user_id'=>1, 'discussion_id'=>1,'content'=>"lorem ipsum dotor amet adflit thasdk"],
            ['user_id'=>2, 'discussion_id'=>2,'content'=>"lorem ipsum dotor amet adflit thasdk"],
            ['user_id'=>1, 'discussion_id'=>3,'content'=>"lorem ipsum dotor amet adflit thasdk"],
            ['user_id'=>2, 'discussion_id'=>4,'content'=>"lorem ipsum dotor amet adflit thasdk"],
        ];

        Reply::insert($replies);
    }
}
