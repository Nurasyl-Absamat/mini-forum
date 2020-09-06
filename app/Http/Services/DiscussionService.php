<?php

namespace App\Http\Services;

use App\Discussion;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Notifications\NewReplyAdded;
use Notification;


class DiscussionService
{
    /**
     * Send notification to watchers if someone will reply to the discussion
     *
     * @param Discussion $discussion
     * @return void
     */
    public function sendNotificationToWatchers(Discussion $discussion)
    {
        $watchers = $this->findWatchers($discussion);


        Notification::send($watchers, new NewReplyAdded($discussion));
    }
     /**
     * Find watchers of the discussion to send them notification
     *
     * @param Discussion $discussion
     * @return @var array $watchers
     */
    public function findWatchers(Discussion $discussion)
    {
        $watchers = [];
        foreach($discussion->watchers as $watch):
            if($watch->user_id != Auth::id())
            {
                array_push($watchers, User::find($watch->user_id));
            }
        endforeach;

        return $watchers;
    }
}
