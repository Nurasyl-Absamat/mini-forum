<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{


    public function index()
    {
        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(3);
                break;

            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }
        return view('forum', ['discussions' => $results]);
    }
}
