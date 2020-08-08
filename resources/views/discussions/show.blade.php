@extends('layouts.app')

@section('content')
<div class="card text-white bg-success mb-5">
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
            {{ $discussion->content}}
        </h5>
    </div>
    <div class="card-footer">
        <div>

        </div>
        <div>
            @if ($discussion->replies->count() != 0)
                    {{ $discussion->replies->count()}} Replies
            @endif
        </div>

    </div>
</div>

@foreach ($discussion->replies as $r)
    <div class="card border-primary primary mb-3">
        <div class="card-header">

            @if ($r->is_reply_by_auth_user())
                <a href="{{route('reply.delete', ['id' => $r->id])}}" class="btn btn-sm btn-danger" style="float: right">Delete</a>
            @endif

            <p>{{$r->user->name}}, <b> {{ $r->created_at->diffForHumans() }} </b></p>

        </div>

        <div class="card-body">

            <h5 class="text-center">
                {{ $r->content }}
            </h5>
        </div>
        <div class="card-footer">
            <div>
                @if ($r->is_liked_by_auth_user())
                    <a href=" {{ route('reply.unlike', ['id' => $r->id]) }} " class="btn btn-secondary btn-sm" style="min-width: 80px">Unlike <span class="badge badge-light">{{ $r->likes->count() }}</span></a>
                @else
                    <a href=" {{ route('reply.like', ['id' => $r->id]) }} " class="btn btn-success btn-sm" style="min-width: 80px">Like <span class="badge badge-light">{{ $r->likes->count() }}</span></a>
                @endif

            </div>

        </div>
    </div>
@endforeach



<div class="card">
    <div class="card-body">
        @if (Auth::check())
            <form action="{{ route('discuss.reply', ['id' => $discussion->id]) }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="reply"> Your Reply</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group text-center">
                    <button class="form-control btn btn-primary">
                        Reply
                    </button>
                </div>
            </form>
    @else
        <h2 class="text-center">
            <a href="{{route('login')}}" style="color: black; ">Sign in for leave a reply</a>
        </h2>
    @endif
</div>

</div>


@endsection
