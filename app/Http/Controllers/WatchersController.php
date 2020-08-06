<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchersController extends Controller
{
    public function watch($id)
    {
        Watcher::create([
            'discussion_id' => $id,
            'user_id' => Auth::id(),
        ]);

        toastr('You are now watching this discussion', 'success');

        return redirect()->route('discuss.show', ['slug' => Discussion::find($id)->slug]);
    }

    public function unwatch($id)
    {
        $watch = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

        $watch->delete();

        toastr('You unwatched this discussion', 'success');

        return redirect()->back();

    }
}
