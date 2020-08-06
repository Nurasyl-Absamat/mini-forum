@extends('layouts.app')

@section('content')


    @foreach ($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                @if ($discussion->is_watched_by_auth_user())
                    <a href="{{route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-secondary" style="float: right">Unwatch</a>
                @else
                    <a href="{{route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-dark" style="float: right">Watch</a>
                @endif

                <p>{{$discussion->user->name}}, <b> {{ $discussion->created_at->diffForHumans() }} </b></p>

                 {{$discussion->channel->title}}
            </div>

            <div class="card-body">
                <h3 class="text-center"><b>{{ $discussion->title }}</b></h3>

                <h5 class="text-center">
                    {{ \Illuminate\Support\Str::limit($discussion->content, 70) }}
                </h5>
            </div>
            <div class="card-footer">
                <div style="float: right">
                    <a href=" {{ route('discuss.showChannel', ['channel' => $discussion->channel_id]) }} " class="btn btn-dark">{{$discussion->channel->title}}</a>
                </div>
                @if ($discussion->replies->count() != 0)
                    {{ $discussion->replies->count()}} Replies
                @endif

            </div>
        </div>
        <br>
    @endforeach
    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
