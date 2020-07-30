<?php

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
        $user = App\User::create([
            'name' => 'Chex',
            'email' => 'chex@petr.me',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);
    }
}
