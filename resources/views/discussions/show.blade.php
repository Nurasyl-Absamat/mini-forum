@extends('layouts.app')

@section('content')
<div class="card text-white bg-success mb-5">
    <div class="card-header">


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
    </div>
</div>

@endsection
