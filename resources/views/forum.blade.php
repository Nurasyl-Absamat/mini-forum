@extends('layouts.app')

@section('content')


    @foreach ($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                <a href="{{route('discuss.show', ['slug' => $discussion->slug]) }}" class="btn btn-dark" style="float: right">View</a>


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
