<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $t1 = 'Implementing OAUTH with laravel Passport';
        $t2 = 'Pagination in vuejs not working properly';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error -  undected database';

        $discussions = [
            ['title'=>$t1, 'content'=>"lorem ipsum dolor sit amet, consecten lorme sadfsdi asdfase dsisea", 'channel_id'=>1, "user_id"=>2,'slug'=>Str::slug($t1)],
            ['title'=>$t2, 'content'=>"lorem ipsum dolor sit amet, consecten lorme sadfsdi asdfase dsisea", 'channel_id'=>2, "user_id"=>1,'slug'=>Str::slug($t2)],
            ['title'=>$t3, 'content'=>"lorem ipsum dolor sit amet, consecten lorme sadfsdi asdfase dsisea", 'channel_id'=>3, "user_id"=>1,'slug'=>Str::slug($t3)],
            ['title'=>$t4, 'content'=>"lorem ipsum dolor sit amet, consecten lorme sadfsdi asdfase dsisea", 'channel_id'=>5, "user_id"=>2,'slug'=>Str::slug($t4)],
        ];

        Discussion::insert($discussions);
    }

}