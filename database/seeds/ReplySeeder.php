<?php

use App\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply1 = [
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex quos blanditiis quisquam debitis, necessitatibus officia vitae inventore tempore nesciunt obcaecati, veritatis corrupti corporis omnis praesentium modi fugit et velit?',
            'discussion_id' => 1,
            'user_id' => 3,
        ];

        $reply2 = [
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex quos blanditiis quisquam debitis, necessitatibus officia vitae inventore tempore nesciunt obcaecati, veritatis corrupti corporis omnis praesentium modi fugit et velit?',
            'discussion_id' => 1,
            'user_id' => 2,
        ];
        $reply3 = [
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex quos blanditiis quisquam debitis, necessitatibus officia vitae inventore tempore nesciunt obcaecati, veritatis corrupti corporis omnis praesentium modi fugit et velit?',
            'discussion_id' => 2,
            'user_id' => 1,
        ];

        Reply::create($reply1);
        Reply::create($reply2);
        Reply::create($reply3);

    }
}
