@extends('layouts.app')

@section('content')
<div class="card">
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
            {{ $discussion->replies->count()}}
        </div>

    </div>
</div>
<br>
@foreach ($discussion->replies as $r)
    <div class="card">
        <div class="card-header">


            <p>{{$r->user->name}}, <b> {{ $r->created_at->diffForHumans() }} </b></p>


        </div>

        <div class="card-body">


            <h5 class="text-center">
                {{ $r->content }}
            </h5>
        </div>
        <div class="card-footer">
            <div>LIKE</div>

        </div>
    </div>
    <br>
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
