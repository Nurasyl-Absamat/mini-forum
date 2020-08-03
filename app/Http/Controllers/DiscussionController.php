<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.discus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'channel_id' => 'required'
        ]);
        $discuss = Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
        ]);

        toastr()->success('Discussion successfully created');

        return redirect()->route('discuss.show', ['slug' => $discuss->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discuss = Discussion::where('slug', $slug)->first();

        return view('discussions.show')->with('discussion', $discuss);
    }


    public function showChannel($id)
    {
        $discussions = Discussion::where('channel_id', $id)->orderBy('created_at', 'desc')->paginate(3);

        return view('discussions.index', ['discussions' => $discussions, 'channelName' => Channel::find($id)->title]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply($id)
    {
        Reply::create([
            'content' => request()->content,
            'user_id' => Auth::id(),
            'discussion_id' => $id
        ]);

        return redirect()->back();
    }
}
