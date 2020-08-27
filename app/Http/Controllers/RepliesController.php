<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    /**
     * Like the the reply
     *
     * @param int $id reply id
     *
     */
    public function like($id)
    {
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id(),
        ]);

        toastr('You liked the reply', 'success');

        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        toastr('You unliked the reply', 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Reply::destroy($id);
        toastr('You successfully deleted your reply');

        return redirect()->back();
    }
}
