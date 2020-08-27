@extends('layouts.app')

@section('content')
<div class="card text-dark bg-primary mb-5">
    <div class="card-header">
        @if ($discussion->is_watched_by_auth_user())
            <a href="{{route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-secondary btn-sm" style="float: right">Unwatch</a>
        @else
            <a href="{{route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-dark btn-sm" style="float: right">Watch</a>
        @endif

        @if (Auth::id() == $discussion->user_id)
            <a href="{{route('discuss.edit', ['id' => $discussion->id]) }}" class="btn btn-danger btn-sm" style="float: right; margin-right: 10px">Edit</a>
        @endif

        <p>{{$discussion->user->name}}, <b> {{ $discussion->created_at->diffForHumans() }} </b></p>

         {{$discussion->channel->title}}
    </div>

    <div class="card-body">
        <h3 class="text-center"><b>{{ $discussion->title }}</b></h3>

        <h5 class="text-center">
            {{ \Illuminate\Mail\Markdown::parse($discussion->content) }}
        </h5>
    </div>
    <div class="card-footer">
        @if (Auth::check() && Auth::id() == $discussion->user_id)
            <div style="float: right">
                <form action="{{route('discuss.delete', ['id' => $discussion->id])}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                </form>

            </div>
        @endif
        <div>
            @if ($discussion->replies->count() != 0)
                    {{ $discussion->replies->count()}} Replies
            @endif
        </div>
    </div>
</div>

@if ($discussion->replies->count() == 0)
    <h1 class="text-center mb-5 text-success">There is no reply leave one if you want</h1>
@else
    @include('discussions.components.comments')
@endif


@include('discussions.components.reply')



@endsection
