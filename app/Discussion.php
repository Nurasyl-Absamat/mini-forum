<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }


    public function is_watched_by_auth_user()
    {
        $id = Auth::id();



        foreach($this->watchers as $watch):
            if ($id == $watch->user_id){
                return true;
            }
        endforeach;
        return false;
    }
}
