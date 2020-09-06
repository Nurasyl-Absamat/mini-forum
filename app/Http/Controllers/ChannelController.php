<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\ChannelRequest;
use Dotenv\Result\Success;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('channels.index')->with('channels', Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(ChannelRequest $request)
    {

        Channel::create([
            'title' => $request->channel,
        ]);
        toastr('Channel Successfully created', 'success');
        return redirect(route('channels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        return view('channels.edit')->with('channel', Channel::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(ChannelRequest $request, $id)
    {

        $channel = Channel::find($id);

        $channel->title = $request->channel;
        $channel->save();
        toastr('Successfully updated');

        return redirect()->route('channels.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Channel::destroy($id);

        toastr('Successfully deleted', 'success');
        return redirect()->back();
    }
}
