<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    =>"admin",
            'avatar'  =>asset('avatars/man.png'),
            'password'=>bcrypt('admin'),
            'email'   => 'admin@example.com',
            'admin'   => 1
        ]);

        User::create([
            'name'      =>'AchieKobby',
            'password'  =>bcrypt('password'),
            'email'     =>'achie@example.com',
            'avatar'    =>asset('avatars/gamer.png')
        ]);
    }
}
