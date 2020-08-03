<?php
use Illuminate\Support\Str;
use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disc2 = [
            'title' => 'How to commit in git?',
            'channel_id' => 1,
            'user_id' => 1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex quos blanditiis quisquam debitis, necessitatibus officia vitae inventore tempore nesciunt obcaecati, veritatis corrupti corporis omnis praesentium modi fugit et velit?',
            'slug' => Str::slug('How to commit in git?'),
        ];

        $disc1 = [
            'title' => 'How to clear array?',
            'channel_id' => 2,
            'user_id' => 4,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex quos blanditiis quisquam debitis, necessitatibus officia vitae inventore tempore nesciunt obcaecati, veritatis corrupti corporis omnis praesentium modi fugit et velit?',
            'slug' => Str::slug('How to clear array?'),
        ];

        Discussion::create($disc1);
        Discussion::create($disc2);

    }
}
