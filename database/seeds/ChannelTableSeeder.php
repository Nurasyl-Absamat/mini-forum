<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'title' => 'GIT',
        ]);
        Channel::create([
            'title' => 'JavaScript',
        ]);
        Channel::create([
            'title' => 'Laravel',
        ]);
        Channel::create([
            'title' => 'Vue',
        ]);
    }
}
