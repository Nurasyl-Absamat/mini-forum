<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Chex',
            'email' => 'chex@petr.me',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);
        User::create([
            'name' => 'Natasha',
            'email' => 'natash@gg.me',
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);

        User::create([
            'name' => 'Andrey',
            'email' => 'andrey@gg.me',
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);
        User::create([
            'name' => 'Nadya',
            'email' => 'nadya@gg.me',
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);
    }
}
