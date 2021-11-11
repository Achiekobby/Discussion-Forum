<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;
use Illuminate\Support\Str;


class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = [
            ["title"=>"Laravel",     'slug' => Str::slug('Laravel')],
            ["title"=>"PHP Testing", 'slug' => Str::slug('php-testing')],
            ["title"=>"Spark",       'slug' => Str::slug('spark')],
            ["title"=>"Lumen",       'slug' => Str::slug('lumen')],
            ["title"=>"React",       'slug' => Str::slug('react')],
            ["title"=>"Forge",       'slug' => Str::slug('forge')],
            ["title"=>"Programming", 'slug' => Str::slug('programming')],
        ];

        Channel::insert($channels);
    }
}
