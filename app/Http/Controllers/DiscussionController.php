<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\Http\Requests\DiscussionRequest;
use App\Http\Services\DiscussionService;
use App\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DiscussionController extends Controller
{
    protected $service;
    protected $discussion;
    public function __construct(Discussion $discussion, DiscussionService $service)
    {
        $this->discussion = $discussion;
        $this->service = $service;
    }
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
    public function store(DiscussionRequest $request)
    {

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

    /**
     * Display discussions with that channel
     *
     * @param int $id
     * @return view with discussions
     */
    public function showChannel($id)
    {
        $d = new Discussion();
        $discussions = $d->channelPaginate($id, 3);

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

        return view('discussions.edit', ['d' => Discussion::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscussionRequest $request, $id)
    {


        $d = Discussion::find($id);

        $d->title = $request->title;
        $d->content = $request->content;
        $d->channel_id = $request->channel_id;

        $d->save();

        toastr('Successfully updated');

        return redirect('/forum?filter=me');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discussion::destroy($id);

        toastr('Successfully deleted', 'success');

        return redirect()->route('forum');
    }
    /**
     * Create the reply for the discussion
     * Also Notification for watchers that someone leaved reply
     *
     * @param int $id discussion id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */

    public function reply($id)
    {

        Reply::create([
            'content' => request()->content,
            'user_id' => Auth::id(),
            'discussion_id' => $id
        ]);
        $d = Discussion::findOrFail($id);

        $this->service->sendNotificationToWatchers($d);

        return redirect()->route('discuss.show', ['slug' => $d->slug]);
    }



}
