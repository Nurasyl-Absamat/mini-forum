@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-center">Edit discussion</div>

    <div class="card-body">

        <form action="{{route('discuss.update', ['id' => $d->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value=" {{$d->title}} ">

            </div>

            <div class="form-group">
                <label for="channel">Pick a channel</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}"
                            @if ($channel->id == $d->channel_id)
                                selected
                            @endif> {{ $channel->title }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Ask a question</label>

                <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{$d->content}} </textarea>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>

    </div>
</div>

@endsection
