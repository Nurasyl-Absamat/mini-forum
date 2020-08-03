<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        return view('forum', ['discussions' => $discussions]);
    }
}
